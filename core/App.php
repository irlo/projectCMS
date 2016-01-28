<?php

require_once('core/config/config.php');

class App {

	protected $url = null;

	public function __construct(){

		try {

			$this->url = Router::init();
			var_dump($this->url);

			require_once(PATH_CONTROLLER.$this->url['controller'].'.php');

			$controller = new $this->url['controller'];

			$controller->{$this->url['method']}();

		}
		catch (Exception $e) {
		    echo $e->getMessage();
		    exit();
		}

	}

}