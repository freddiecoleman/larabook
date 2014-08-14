<?php namespace Larabook\Handlers;

use Larabook\Registration\Events\UserRegistered;
use Laracasts\Commander\Events\EventListener;

class EmailNotifier extends EventListener {

    public function whenUserRegistered(UserRegistered $event)
    {

    }

} 