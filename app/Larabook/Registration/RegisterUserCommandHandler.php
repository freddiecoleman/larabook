<?php namespace Larabook\Registration;


use Laracasts\Commander\CommandHandler;

class RegisterUserCommandHandler implements CommandHandler {

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $user = User::register(
            $command->username, $command->email, $command->password
        );

        return $user;
    }
}