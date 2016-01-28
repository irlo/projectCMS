<?php

class home extends Controller {

	public function __construct(){

		parent::__construct();
		var_dump('home_controller');
		$this->init();

	}

	public function index(){

		$this->view->title = 'TYTUL';

		$this->view->users = $this->model->getUsers();

		$this->view->render('default/home/index');

		//var_dump($this->url);

	}

}