<?php

require_once('core/config/config.php');

class App {

	public $arrayUrl = null;

	public function __construct(){

		try {

			$this->arrayUrl = Router::init();
			$this->runController($this->checkFileExist(PATH_CONTROLLER,$this->arrayUrl['controller'],false),$this->arrayUrl['controller']);

		}
		catch (CriticalError $e) {
		    $this->view = new View;
		    $this->view->message = $e->getMessage();
		    $this->view->renderFatalError();
		    exit();
		}
		catch (Exception $e) {
		    echo $e->getMessage();
		    exit();
		}

	}

	private static function runController($path, $name){

		if($path){
			require_once($path);
			return new $name;
		} else {
			throw new CriticalError("Nie mogę załadować kontrolera");
		}

	}

	public static function checkFileExist($path, $name, $report=true, $type='.php', $file=true){

		if($file == true){

			if(file_exists($path.$name.$type)){
				return $path.$name.$type;
			} else {
				if($report == true){
					throw new Exception("Nie odnaleziono pliku: <b>$path$name$type</b>");
				} else {
					return false;
				}
			}

		} else {

			if(file_exists($path.$name)){
				return $path.$name.$type;
			} else {
				if($report == true){
					throw new Exception("Nie odnaleziono folderu: <b>$path$name</b>");
				} else {
					return false;
				}
			}

		}

	}

}