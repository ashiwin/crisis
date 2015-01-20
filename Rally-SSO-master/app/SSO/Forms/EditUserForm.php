<?php namespace SSO\Forms;

use Laracasts\Validation\FormValidator;

class EditUserForm extends FormValidator {

    protected $rules = [
        'username' => 'required|min:6',
        'email' => 'required',
        'firstname' => 'required',
        'lastname' => 'required'
    ];
}