<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\Utility\DateTime;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;

/**
 * Stories Controller
 *
 * @property \App\Model\Table\StoriesTable $Stories
 *
 * @method \App\Model\Entity\Story[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoriesController extends AppController
{
    public function view($slug = null) {
        $story = $this->Stories
            ->findBySlug($slug)
            ->contain('Users')
            ->contain(['Comments' => 'Users'])
            ->contain(['Comments' => ['Replies' => 'Users']])
            ->firstOrFail();
        
        $comments = TableRegistry::get('Comments');
        $comment = $comments->newEntity([
            'story_id' => $story->id,
            'user_id' => $this->Auth->user('id')
        ]);
        if ($this->request->is('post') && $this->request->getData('type') === 'comment') {
            $comment = $comments->patchEntity($comment, $this->request->getData());
            if ($comments->save($comment)) {
                return $this->redirect(['action' => 'view', $slug]);
            } else {
                $this->Flash->error('There was an error while posting your comment.');
            }
        }

        $replies = TableRegistry::get('Replies');
        $replyContext = $replies->newEntity(['user_id' => $this->Auth->user('id')]);
        if ($this->request->is('post') && $this->request->getData('type') === 'reply') {
            $replyContext = $replies->patchEntity($replyContext, $this->request->getData());
            if ($replies->save($replyContext)) {
                return $this->redirect(['action' => 'view', $slug]);
            } else {
                $this->Flash->error('There was an error while sending your reply.');
            }
        }

        $stories = $this->Stories->find()->where(['id !=' => $story->id])->limit(4);

        $this->set('story', $story);
        $this->set('comment', $comment);
        $this->set('replyContext', $replyContext);
        $this->set('stories', $stories);
    }

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        if (in_array($action, ['view', 'search']))
            return true;
            
        $slug = $this->request->getParam('pass.0');
        if (!$slug)
            return false;
            
        $story = $this->Stories->findBySlug($slug)->first();
        return $story->author_id === $user['id'];
    }

    public function search() {
        if ($this->request->getParam('pass')) {
            $input = h($this->request->getParam('pass')[0]);
        } else {
            $input = h($this->request->getQuery('input'));
        }
        
        $stories = $this->Stories->find()->where([
            'OR' => [
                ['text LIKE' => "%$input%"],
                ['title LIKE' => "%$input%"],
            ]
        ]);
        $this->set('stories', $stories);
    }
}
