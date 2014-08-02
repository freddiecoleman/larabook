<?php

use Larabook\Statuses\PublishStatusCommand;
use Larabook\Core\CommandBus;

class StatusController extends BaseController {

    use CommandBus;

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('statuses.index');
	}

	/**
	 * Save a new status
	 *
	 * @return Response
	 */
	public function store()
	{
		$command = new PublishStatusCommand(Input::get('body'));
        $this->execute($command);
	}

}
