<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Laracasts\Commander\CommandBus;

class RegistrationController extends \BaseController {

    private $registrationForm;
    /**
     * @var Laracasts\Commander\CommandBus
     */
    private $commandBus;

    function __construct(CommandBus $commandBus, RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;
        $this->commandBus = $commandBus;
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

      extract(Input::only('username', 'email', 'password'));

      $command = new RegisterUserCommand($username, $email, $password);

      $user = $this->commandBus->execute($command);

      Auth::login($user);

      return Redirect::home();
  }


}
