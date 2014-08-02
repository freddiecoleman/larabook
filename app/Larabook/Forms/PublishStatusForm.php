<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class PublishStatusForm extends FormValidator {

    // Validation rules for the post status form
    protected $rules = [
        'body' => 'required'
    ];

} 