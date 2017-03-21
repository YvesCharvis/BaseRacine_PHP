<?php
namespace App; 							//adresse l'espace pour les constantes, class etc etc évite les conflits | Travail dans l'espace App


class App
{
	const DB_NAME='newapp'; 			// Création de constante Dans la classe qui nous permetrons de nous connecter a la DB
	const DB_USER='root';
	const DB_PASS='';
	const DB_HOST='localhost';

	private static $database;
	private static $title = 'BlogProject';

	public static function getDb(){
		if(self::$database===null){ 	 // Si $satabase === null ont crée une nouvelle database
			self::$database = new Database(
				self::DB_NAME,           //Self est utilisé pour les constantes (vu qu'il son non modifiable) sinon c'est this
				self::DB_USER,
				self::DB_PASS,
				self::DB_HOST
				);
		}
		return self::$database;

	}
	public static function notFound(){
		header("HTTP/1.0 404 Not Found");
		header('location: index.php?p=404'); // en raport avec ob_start();	dans l'index la page mise en cache
	}
	public static function getTitle()
	{
		return self::$title;
	}
		public static function setTitle($name)
	{
		self::$title = $name." | ".self::$title;
	}
}