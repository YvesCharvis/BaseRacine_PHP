<?php
namespace App; 							//adresse l'espace pour les constantes, class etc etc évite les conflits | Travail dans l'espace App


class App
{

public $titre = 'Blog Project';
private static $_instance;
private $db_instance;

public static function getInstance(){
	if(self::$_instance===NULL){
	self::$_instance = new App();
	}
	return self::$_instance;
}

	public static fonction getTable($name){
		$class_name = 'App\\Tables\\'.ucfirst($name).'Table';
		return new $class_name();
	}

	public fonction getDb(){
		$config = Config::getinstance();
		if (is_null($this->db_instance)){
			$this->db_instance = new database();
			$config->get('db_name');

			
		}
	}

}
