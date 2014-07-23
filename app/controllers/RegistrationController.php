<?php

use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Larabook\Core\CommandBus;

class RegistrationController extends BaseController {

    use CommandBus;

    private $registrationForm;

    function __construct(RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;
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

      $user = $this->execute($command);

      Auth::login($user);

      return Redirect::home();
  }


}
