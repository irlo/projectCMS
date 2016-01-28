<?php

class home_model extends Model {

	public function __construct(){

		parent::__construct();
		var_dump('home_model');

	}

	public function getTitle(){

		return $this->titleMasterModel;

	}

	public function getUsers(){

		$statement = $this->db->prepare('SELECT * FROM users');

		if(!$statement){
		    var_dump($this->db->errorInfo());
		    die();
		}

		$statement->execute();

		$error = $statement->errorInfo();
		if($error[0] !== '00000'){
		    var_dump($error);
		    die();
		}

		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		
		$statement->closeCursor();

		return $result;

	}

}