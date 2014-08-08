<?php

use Illuminate\Support\Facades\Redirect;
use Larabook\Users\FollowUserCommand;

class FollowsController extends \BaseController {

	/**
	 * Follow a user
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = array_add(Input::get(), 'userId', Auth::id());
		$this->execute(FollowUserCommand::class, $input);

        Flash::info('You are now following this user.');

        return Redirect::back();
	}

	/**
	 * Unfollow a user
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
