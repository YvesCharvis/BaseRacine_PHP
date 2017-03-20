<?php
namespace App;
use \PDO;

/**
* connexion a la base de donnée
*/
class Database
{
	
	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $pdo;


	function __construct($db_name, $db_user='root', $db_pass='', $db_host='localhost')
	{
			$this->db_name= $db_name;
			$this->db_user= $db_user;
			$this->db_pass= $db_pass;
			$this->db_host= $db_host;
	}

	private function getPdo(){
		if($this->pdo === null){
		 	$pdo = new PDO('mysql:dbname='.$this->db_name.';host='.$this->db_host.';charset=UTF8', $this->db_user, $this->db_pass);
  			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  			$this->pdo = $pdo;
  		}
  		return $this->pdo;
	}

	public function query($statement, $class_name){

		$req = $this->getPdo()->query($statement);
		$datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
		return $datas;
	}
	public function prepare($statement, $parametre){
		$req = $this->getPdo()->prepare($statement);
		$req->execute($parametre);
		$req->setFetchMode(PDO::FETCH_OBJ);
		$datas= $req->fetch();
		return $datas;
	}
}