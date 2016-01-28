<?php

class Controller {

	public function __construct(){

		var_dump('CONTROLLER');

		$this->view = new View;

	}

	protected function init(){

		try {
			require_once('app/models/home_model.php');
			$this->model = new home_model;
		} 
		catch (Exception $e) {
		    echo $e->getMessage();
		    exit();
		} 

	}

}