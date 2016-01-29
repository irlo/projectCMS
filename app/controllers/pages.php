<?php

class pages extends Controller {

	public function __construct(){

		parent::__construct();
		var_dump('PAGES_CONTROLLER');

	}

	public function index(){

		echo 'metoda index';
		
	}

}