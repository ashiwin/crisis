<?php

class APIController extends \BaseController {

	function __construct()
	{
		$this->beforeFilter('auth');
		$this->beforeFilter('oauth');
	}

	public function user()
	{
		$user = User::find(Auth::user()->id);

//		return $user;
		return Response::json($user);
	}
}