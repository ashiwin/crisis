<?php

use SSO\Forms\CreateUserForm;
use SSO\Forms\EditUserForm;

class UserController extends \BaseController {

	/**
	 * @var CreateUserForm
	 */
	private $createUserForm;

	/**
	 * @var EditUserForm
	 */
	private $editUserForm;

	function __construct(CreateUserForm $createUserForm, EditUserForm $editUserForm)
	{
		$this->createUserForm = $createUserForm;
		$this->beforeFilter('guest', ['only' => ['create', 'store']]);
		$this->beforeFilter('auth', ['only' => ['index', 'edit', 'update', 'destroy']]);
		$this->editUserForm = $editUserForm;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::paginate(15);

		return View::make('users.index', compact('users'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->createUserForm->validate(Input::only('username', 'email', 'firstname', 'lastname', 'password', 'password_confirmation'));

		User::create([
			'username' => Input::get('username'),
			'email' => Input::get('email'),
			'firstname' => Input::get('firstname'),
			'lastname' => Input::get('lastname'),
			'password' => Input::get('password'),
		]);

		Flash::overlay('New user has been created. You may now login.', 'Rally SSO');

		return Redirect::route('login');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);

		return View::make('users.edit', compact('user'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$this->editUserForm->validate(Input::all());

		$user = User::findOrFail($id);

		$user->username = Input::get('username');
		$user->email = Input::get('email');
		$user->firstname = Input::get('firstname');
		$user->lastname = Input::get('lastname');
		$user->save();

		Flash::success('User has been updated.');

		return Redirect::route('users');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::findOrFail($id);

		$user->delete();

		return Redirect::route('users');
	}

}
