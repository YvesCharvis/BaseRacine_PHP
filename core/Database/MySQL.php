<?php
namespace Core\Database; //adresse l'espace pour les constantes, class etc etc évite les conflits | Travail dans l'espace App
use \PDO; // Ont appel la class PDO défini par php

/**
* connexion a la base de donnée
*/
class MysqlDatabase extends Database
{	
	private $db_name;  //Non de la table
	private $db_user;  // Variable non modifiable, ni les echo utilisable seulement dans la classe
	private $db_pass;
	private $db_host;
	private $pdo;


	function __construct($db_name, $db_user='root', $db_pass='', $db_host='localhost') // Ce connecter a la bace de donné __contructe nous permet de recupérer les methode privates et leurs définir une variable
	{
			$this->db_name= $db_name;
			$this->db_user= $db_user; 					//affectations de variable (défini)
			$this->db_pass= $db_pass;
			$this->db_host= $db_host;
	}

	private function getPdo(){        					//SECURE evite de la raplé
			if($this->pdo === null){  					// SI c'est la base de donné n'est pas saisie il demande a saisir
		 	$pdo = new PDO('mysql:dbname='.$this->db_name.';host='.$this->db_host.';charset=UTF8', $this->db_user, $this->db_pass); 
  			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  			$this->pdo = $pdo;
  		}
  		return $this->pdo;          					 //si pdo existe returne $this->PDO
	}

	public function query($statement, $class_name){ 

		$req = $this->getPdo()->query($statement);        // Query execute une requête SQL $statement est = SELECT INSERT etc etc
		$req->setFetchMode(PDO::FETCH_CLASS, $class_name);// Definit son mode de recupération 
		$datas = $req->fetchAll();                        // fetchall : mets dans un tableau
		return $datas;
	}
	public function prepare($statement, $parametre, $class_name, $one=false){
														 //Prepapare avant l'exécution et retourne en objet
		
		$req = $this->getPdo()->prepare($statement); 	 //
		$req->execute($parametre);						 //Execute $parametre
		$req->setFetchMode(PDO::FETCH_CLASS, $class_name);
		if ($one===false){ 								 // Si y'a plusieur donné execute fatchAll pour y mettre dans sun tableau (un objet avec le tableau)
			$datas= $req->fetchAll();
		}else{
			$datas= $req->fetch(); 						 // Sinon c'est fetch pour une seul donné (une seul ligne)
		}
		return $datas;									 //Retourne les données dans $datas en objet 
	}
}