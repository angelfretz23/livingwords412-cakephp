<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{

    public function welcome($user)
    {
        $this
            ->to($user->email)
            ->subject(sprintf('Welcome %s', $user->name))
            ->template('welcome_mail')// By default template with same name as method name is used.
            ->layout('custom');
    }

    public function resetPassword($user)
    {
        $this
            ->to($user->email)
            ->subject('Reset password');
           // ->set(['token' => $user]);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       token]);
    }
}