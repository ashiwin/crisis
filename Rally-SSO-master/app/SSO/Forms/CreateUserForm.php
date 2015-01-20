<?php namespace SSO\Forms;

use Laracasts\Validation\FormValidator;

class CreateUserForm extends FormValidator {

    protected $rules = [
        'username' => 'required|min:6|unique:users',
        'email' => 'required|unique:users|email',
        'firstname' => 'required',
        'lastname' => 'required',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required'
    ];
}