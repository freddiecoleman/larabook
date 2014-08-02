<?php namespace Larabook\Statuses;

use Laracasts\Commander\CommandHandler;

class PublishStatusCommandHandler implements CommandHandler {

    protected $statusRepository;

    function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $status = Status::publish($command->body);
        $this->statusRepository->save($status);
    }
}