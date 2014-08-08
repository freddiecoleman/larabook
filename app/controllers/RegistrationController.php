<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Laracasts\Commander\CommanderTrait;

class RegistrationController extends BaseController {

    use CommanderTrait;

    private $registrationForm;

    function __construct(RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;

        $this->beforeFilter('guest');
    }

    /**
	 * Show a form to register the user.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('registration.create');
	}

  public function store()
  {
      $this->registrationForm->validate(Input::all());

      $user = $this->execute(RegisterUserCommand::class);

      Auth::login($user);

      Flash::message('Glad to have you as a new Larabook member');

      return Redirect::home();
  }


}
