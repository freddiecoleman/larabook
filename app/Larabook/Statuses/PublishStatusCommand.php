<?php namespace Larabook\Statuses;

class PublishStatusCommand {

    public $body;

    function __construct($body)
    {
        $this->body = $body;
    }


}