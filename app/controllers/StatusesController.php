<?php

use Larabook\Forms\PublishStatusForm;
use Larabook\Statuses\PublishStatusCommand;
use Larabook\Statuses\StatusRepository;

class StatusesController extends BaseController {

    protected $statusRepository;
    /**
     * @var Larabook\Forms\PublishStatusForm
     */
    protected $publishStatusForm;

    /**
     * @param PublishStatusForm $publishStatusForm
     * @param StatusRepository $statusRepository
     */
    function __construct(PublishStatusForm $publishStatusForm, StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
        $this->publishStatusForm = $publishStatusForm;
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $statuses = $this->statusRepository->getAllForUser(Auth::user());

		return View::make('statuses.index', compact('statuses'));
	}

	/**
	 * Save a new status
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();
        $input['userId'] = Auth::id();
        $this->publishStatusForm->validate($input);

        $this->execute(PublishStatusCommand::class, $input);

        Flash::message('Your status has been updated!');

        return Redirect::back();
	}

}
