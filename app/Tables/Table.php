<?php
namespace App\Tables;

use App\App;

/**
* 
*/
class Table
{
	protected static $table;

	private static function getTable(){ 							// création de la fonction Table statice et protect
		if(static::$table===null){									//Si elle es null 
			$class_name = explode('\\', get_called_class());		//ça sépare une chaine de carractère  pour en faire un tableau a chaque "\"
			static::$table = strtolower(end($class_name))."s";		// Transforme en minuscule et rajoute un s
		}
		return static::$table; // retour de table 
		
	}

	public static function all(){

		return App::getDb()->query("
			SELECT * 
			FROM ".static::getTable()."
			", get_called_class());
	} 																//Retour depuis le dossier App
	
	public function __get($key){       
		$method = 'get'.ucfirst($key);								//ucfirst met en maj la 1ier lettre
		$this->$key = $this->$method(); 							//(objet->$key = object -->methode)
		return $this->$key;											//transforme une variable en URL pour simplifié son appel

	}

	public static function find($id){								//Selectionne toute la tablefunction qui permet de trouver uen id depuis le fichier app.php et de préparer la fonction getDb
		return App::getDb()->prepare("      											
			SELECT * 
			FROM ".static::getTable()." 
			WHERE id = ?",											//Recherche l'id ou elle est egale a ce qu'on nous cherchons 
			[$id],
			get_called_class(),
			true);
	}
	public static function query($statement,  , $one = false){
		if ($atribute){
			return App::getDb()->prepare($statement, $atribute, get_called_class(), $one); // si null -> Prépare
		}else{
		 return App::getDb()->query($statement, get_called_class(), $one); // sinon retuour sur query 
		}
		

	}

}