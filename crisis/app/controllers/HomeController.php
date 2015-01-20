<?php

class HomeController extends BaseController {

	public function index()
	{
		$view = array();

		return View::make('main.front', array('view'=>$view));
	}

}