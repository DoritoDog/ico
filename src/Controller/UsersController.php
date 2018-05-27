<?php
// git commit -m "reason"
// git push -u origin master

namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Utility\Security;
use Cake\I18n\Time;
use Cake\Chronos\Chronos;

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Account;
use Coinbase\Wallet\Resource\Address;
use Coinbase\Wallet\Enum\Param;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public $client;
    public $bitcoinAccount;
    public $ethAccount;
    public $litecoinAccount;

    public function initialize() {
        parent::initialize();

        $apiKey = 'o5byroDsg9W3wxXW';
        $apiSecret = '4JnhDCTqqA1Z9P99rsiL2LrvJTzPuo3m';
        
        $configuration = Configuration::apiKey($apiKey, $apiSecret);
        $this->client = Client::create($configuration);

        $this->bitcoinAccount = $this->client->getAccount('407de93f-580f-58c3-8e13-c2ff335fe20f');
        $this->ethAccount = $this->client->getAccount('3c226868-5d3f-5e9d-8585-11128c53faab');
        $this->litecoinAccount = $this->client->getAccount('0f39ae51-8472-5c76-86ae-e63a18fd690c');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $addressRequest = new Address(['name' => $user->id]);
                $address = $this->client->createAccountAddress($this->bitcoinAccount, $addressRequest);
                $user->bitcoin_address = $address->getAddress();
                
                $addressRequest = new Address(['name' => $user->id]);
                $address = $this->client->createAccountAddress($this->litecoinAccount, $addressRequest);
                $user->litecoin_address = $address->getAddress();
                if ($this->Users->save($user)) {
                    return $this->redirect(['action' => 'login']);
                }
            } else {
                $this->Flash->error(__('Registration failed. Please try again.'));
            }
        }

        $countries = TableRegistry::get('Countries')->find();

        $this->set('user', $user);
        $this->set('countries', $countries);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Your username or password is incorrect.'));
            }
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function index() {
        $user = $this->Users->get($this->Auth->user('id'));
        $date = Time::now();
        $rates = $this->client->getExchangeRates();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $this->Users->save($user);
        }

        $stories = TableRegistry::get('Stories')
            ->find()
            ->order(['Stories.created' => 'ASC'])
            ->contain('Users')
            ->limit(5)
            ->toArray();
            
        $main_story = end($stories);
        array_pop($stories);

        $this->set('user', $user);
        $this->set('date', $date);
        $this->set('rates', $rates['rates']);
        $this->set('stories', $stories);
        $this->set('main_story', $main_story);
    }

    public function buyAndTransfer() {
        $user = $this->Users->get($this->Auth->user('id'));
        $transfers = TableRegistry::get('Transfers')
            ->findByFrom_address($user->wallet_address);

        $transactions = $this->client->getAccountTransactions($this->bitcoinAccount);

        $this->set('user', $user);
        $this->set('transfers', $transfers);
        $this->set('contractAddress', '0x0953972457d2341557Eda81E041554b6fA074375');
        $this->set('transactions', $transactions);
    }

    public function news() {
        $user = $this->Users->get($this->Auth->user('id'));

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $this->Users->save($user);
        }

        $stories = TableRegistry::get('Stories')
            ->find()
            ->order(['Stories.created' => 'ASC'])
            ->contain('Users')
            ->limit(5)
            ->toArray();
            
        $main_story = end($stories);
        array_pop($stories);

        $date = Time::now();

        $this->set('user', $user);
        $this->set('stories', $stories);
        $this->set('main_story', $main_story);
        $this->set('date', $date);
    }

    public function isAuthorized() {
        return true;
    }

    public function profile() {
        $user = $this->Users->get($this->Auth->user('id'));

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your data has been saved.'));
                return $this->redirect(['action' => 'profile']);
            } else {
                $this->Flash->error(__('An error occoured while saving your data.'));
            }
        }

        $countries = TableRegistry::get('Countries')->find();
        
        $this->set('user', $user);
        $this->set('countries', $countries);
    }

    public function sendResetCode() {
        $user = $this->Users->findByEmail($this->Auth->user('email'))->first();
        if (is_null($user)) {
            $this->Flash->error('Email address does not exist. Please try again');
        } else {
            $passkey = uniqid();
            $url = Router::Url(['controller' => 'Users', 'action' => 'reset'], $passkey);
            $timeout = time() + DAY;

            $resetData = ['passkey' => $passkey, 'timeout' => $timeout];
            if ($this->Users->updateAll($resetData, ['id' => $user->id])){

                $this->Flash->success($passkey);
                $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error('An unexpected error occoured, Please try again later.');
            }
        }
    }

    public function reset($passkey = null) {
        if ($passkey) {
            $conditions =  ['passkey' => $passkey, 'timeout >' => time()];
            $query = $this->Users->find('all', ['conditions' => $conditions]);
            $user = $query->first();
            if ($user) {
                if (!empty($this->request->data)) {
                    $this->request->data['passkey'] = null;
                    $this->request->data['timeout'] = null;
                    $user = $this->Users->patchEntity($user, $this->request->data);
                    if ($this->Users->save($user)) {
                        $this->Flash->set(__('Your password has been updated.'));
                        return $this->redirect(array('action' => 'login'));
                    } else {
                        $this->Flash->error(__('The password could not be updated. Please, try again.'));
                    }
                }
            } else {
                $this->Flash->error('Invalid or expired code. Please check your email or try again');
                $this->redirect(['action' => 'resetPassword']);
            }
            unset($user->password);
            $this->set(compact('user'));
        } else {
            $this->redirect('/');
        }
    }

    public function blockExplorer() {

    }

    public function icoStatistics() {
        $investorsCount = $this->Users->find()->count();
        
        $fundsRaised = $this->bitcoinAccount->getBalance()->getAmount();// +
            // $this->ethereumAccount->getBalance()->getAmount() +
            // $this->litecoinAccount->getBalance()->getAmount();
        $fundsRaised = round($fundsRaised, 2);

        $tokenSupply = 10000;
        
        $phases = TableRegistry::get('Phases');
        $phase = $phases->find()->first();
        
        $difference = Chronos::today()->diff($phase->deadline);
        $daysLeft = $difference->days;

        $raisedThisPhase = $this->getPhaseFundsRaised($phase->id);

        $this->set('investorsCount', $investorsCount);
        $this->set('fundsRaised', $fundsRaised);
        $this->set('tokenSupply', $tokenSupply);
        $this->set('phases', $phases->find());
        $this->set('phase', $phase);
        $this->set('daysLeft', $daysLeft);
        $this->set('raisedThisPhase', $raisedThisPhase);
    }

    // $current should be zero indexed.
    public function getPhaseFundsRaised($current) {
        $phases = TableRegistry::get('Phases')
            ->find()
            ->limit($current)
            ->toArray();

        $total = 0;
        foreach ($phases as $phase) {
            $total += $phase->goal;
        }

        return $total;
    }

    public function settings() {
        return $this->redirect(['action' => 'index']);
    }
}