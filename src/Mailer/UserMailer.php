<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
    public function welcome($user, $dashboardUrl, $newsUrl)
    {
        $this->setTo($user->email)
            ->setProfile('gmail')
            ->setSubject(sprintf('Welcome %s', $user->name))
            ->emailFormat('html')
            ->viewVars(['firstName' => $user->first_name, 'dashboardUrl' => $dashboardUrl, 'newsUrl' => $newsUrl]);
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