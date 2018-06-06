<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    public function welcome($user)
    {
        $this->to($user->email)
            ->subject(sprintf('Welcome %s', $user->name))
            ->template('welcome_mail', 'custom');
    }

    public function resetPassword($user, $url)
    {
        $this->setTo($user->email)
            ->setProfile('gmail')
            ->setSubject('Reset your CryptoToken password')
            ->emailFormat('html')
            ->viewVars(['url' => $url]);
    }
}