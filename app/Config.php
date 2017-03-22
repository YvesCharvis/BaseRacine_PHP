<?php
namespace App;

/**
* INSTANCIER CONSTANT ET STATIC VARIABLE
*/
class Config
{
	private static $_instance;
	private $setting =[];
	public $id;


	public static function getInstance(){
 if(self::$_instance===NULL){
		self::$_instance = new Config();
		}
		return self::$_instance;
										 }

	public function __construt(){
		$this->setting = require dirname(__DIR__).'/config/config.php';
		$id = uniqid();						}


}