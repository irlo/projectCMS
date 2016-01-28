<?php

class Database extends PDO {

	public function __construct(){

		$config = CORE_FOLDER.'config/db_config.php';

		if(!file_exists($config)){
			throw new Exception('Plik konfiguracyjny bazy danych nie został znaleziony');
		}

		require_once($config);

		parent::__construct('mysql:host='.$host.';dbname='.$db, $user, $pass);

	}

}