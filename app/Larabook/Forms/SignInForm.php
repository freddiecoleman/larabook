<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class SignInForm extends FormValidator {

    // Validation rules for the login form
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

} 