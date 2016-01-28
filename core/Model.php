<?php

class Model {

	protected $db = null;

	public function __construct(){

		var_dump('MODEL');

		try {
			require_once(CORE_FOLDER.'Database.php');
			$this->db = new Database();
		}
		catch (PDOException $e){
		    throw new Exception("Error, błąd połączenia z bazą danych"); 
		}

	}

	public function __destruct(){

		$this->db = null;

	}

}