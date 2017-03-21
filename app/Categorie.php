<?php
namespace App;

use App\App;

/**
* 
*/
class Categorie
{
	
	public static function getAll(){
		return App::getDb()->query("
			SELECT *
			FROM categories
			");
	}
}