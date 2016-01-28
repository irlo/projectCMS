<?php

class Router {

	public static function init(){

		$arrayUrl = Array('controller' => '',
					 	  'method' => '',
					 	  'params' => Array(),
					 	  'url' => Array()
					 	  );

		self::setUrl($arrayUrl);

		define('APP_ROOT_FOLDER',self::setAppRootFolder($arrayUrl));
		define('PATH_MODEL',APP_ROOT_FOLDER.'models/');
		define('PATH_VIEW',APP_ROOT_FOLDER.'views/');
		define('PATH_CONTROLLER',APP_ROOT_FOLDER.'controllers/');

		self::setController($arrayUrl);
		//self::setMethod($arrayUrl);
		//self::setParams($arrayUrl);

		return $arrayUrl;
		
	}

	private static function getUrl(){

		if(isset($_GET['url'])){
			return explode('/', rtrim($_GET['url'],'/'));
		} else {
			return Array();
		}

	}

	private static function setUrl(&$array){

		$array['url'] = self::getUrl();

	}

	private static function setAppRootFolder(&$array){

		$folder = APP_FOLDER;

		if(NAME_ADMINISTRATOR != ''){
			if(!empty($array['url'])){
				if($array['url'][0] == NAME_ADMINISTRATOR){
					$folder = ADMIN_FOLDER;
					array_shift($array['url']);
				} 
			}
		} 

		return $folder;

	}

	private static function setController(&$array){

		if(APP_ROOT_FOLDER == APP_FOLDER){
			$defaultController = 'home';
		} else {
			$defaultController = 'login';
		}

		if(!empty($array['url'])){
			if($array['url'][0] == 'index'){
				$array['controller'] = $defaultController;
			} else {
				$array['controller'] = $array['url'][0];
			}
			array_shift($array['url']);
		} else {
			$array['controller'] = $defaultController;
		}

		if(empty($array['url'])){
			unset($array['url']);
		}

	}

	private static function setMethod(&$array){

		if(isset($array['url'])){
			$array['method'] = $array['url'][0];
			array_shift($array['url']);
			if(empty($array['url'])){
				unset($array['url']);
			}
		} else {
			$array['method'] = 'index';
		}

	}

	private static function setParams(&$array){

		if(isset($array['url'])){
			$counter = 0;
			foreach($array['url'] as $param){
				$array['params'][$counter] = $param;
				$counter++;
			}
			unset($array['url']);
		} 

	}

}