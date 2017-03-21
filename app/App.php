<?php
namespace App;


class App
{
	const DB_NAME='newapp';
	const DB_USER='live';
	const DB_PASS='live';
	const DB_HOST='localhost';

	private static $database;
	private static $title = 'mon super site';

	public static function getDb(){
		if(self::$database===null){
			self::$database = new Database(
				self::DB_NAME,
				self::DB_USER,
				self::DB_PASS,
				self::DB_HOST
				);
		}
		return self::$database;

	}
	public static function notFound(){
		header("HTTP/1.0 404 Not Found");
		header('location: index.php?p=404');
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