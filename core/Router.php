<?php

class Router {

	public static function init(){

		$arrayUrl = Array('controller' => '',
					 	  'method' => '',
					 	  'params' => Array(),
					 	  'url' => Array()
					 	  );

		self::setUrl($arrayUrl);

		define('NAME_ADMINISTRATOR','admin');
		
		define('MASTER_CONTROLLER_APP','home');
		define('MASTER_CONTROLLER_ADMIN','login');
		define('DEFAULT_METHOD','index');

		define('APP_ROOT_FOLDER',self::setAppRootFolder($arrayUrl));
		define('PATH_MODEL',APP_ROOT_FOLDER.'models/');
		define('PATH_VIEW',APP_ROOT_FOLDER.'views/');
		define('PATH_CONTROLLER',APP_ROOT_FOLDER.'controllers/');

		self::setController($arrayUrl);
		$path = App::checkFileExist(PATH_CONTROLLER,$arrayUrl['controller'],false);
		if(!$path){
			self::setDefaultController($arrayUrl,'pages');
		}
		self::setDefaultMethod($arrayUrl);

		echo 'var_dump w pliku Router.php';
		var_dump($arrayUrl);

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

		
			if(!empty($array['url'])){
				if($array['url'][0] == NAME_ADMINISTRATOR){
					if(file_exists(ADMIN_FOLDER)){
						$folder = ADMIN_FOLDER;
						array_shift($array['url']);
					}
				} 
			}

		return $folder;

	}

	private static function setController(&$array){

		if(APP_ROOT_FOLDER == APP_FOLDER){
			$defaultController = MASTER_CONTROLLER_APP;
		} else {
			$defaultController = MASTER_CONTROLLER_ADMIN;
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

	private static function setDefaultController(&$array, $default='pages'){

		if(APP_ROOT_FOLDER == APP_FOLDER){
			if($array['controller'] == NAME_ADMINISTRATOR){
				throw new CriticalError("Adres strony wskazuje na stronę administratora, która nie jest dostępna");
			} else {
				$array['controller'] = $default;
			}
		}

	}

	private static function setDefaultMethod(&$array){

		$array['method'] = DEFAULT_METHOD;

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