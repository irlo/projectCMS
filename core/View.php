<?php

class View {

	public function __construct(){

		var_dump('VIEW');

	}

	public function render($path){
		require_once(APP_ROOT_FOLDER.'views/'.$path.'.php');
	}

}