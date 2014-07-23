<?php namespace Larabook\Registration;


use Larabook\Users\UserRepository;
use Laracasts\Commander\CommandHandler;
use Larabook\Users\User;

class RegisterUserCommandHandler implements CommandHandler {

    protected $repository;

    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

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

        $this->repository->save($user);

        return $user;
    }
}