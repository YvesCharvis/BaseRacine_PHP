<?php
namespace App\Tables;

use App\App;

/**
* 
*/
class Table
{
	protected static $table;

	private static function getTable(){
		if(static::$table===null){
			$class_name = explode('\\', get_called_class());
			static::$table = strtolower(end($class_name))."s";
		}
		return static::$table;
		
	}

	public static function all(){

		return App::getDb()->query("
			SELECT * 
			FROM ".static::getTable()."
			", get_called_class());
	}
	
	public function __get($key){
		$method = 'get'.ucfirst($key);
		$this->$key = $this->$method();
		return $this->$key;

	}

	public static function find($id){
		return App::getDb()->prepare("
			SELECT * 
			FROM ".static::getTable()." 
			WHERE id = ?",
			[$id],
			get_called_class(),
			true);
	}
	public static function query($statement, $atribute = null, $one = false){
		if ($atribute){
			return App::getDb()->prepare($statement, $atribute, get_called_class(), $one);
		}else{
		 return App::getDb()->query($statement, get_called_class(), $one);
		}
		

	}

}