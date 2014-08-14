<?php namespace Larabook\Mailers;


class UserMailer extends Mailer {

    public function sendWelcomeMessageTo(User $user)
    {
        $subject = 'Welcome to Larabook!';
        $view = 'emails.registration.confirm';
        $data = [];

        return $this->sendTo($user, $subject, $view, $data);
    }

} 