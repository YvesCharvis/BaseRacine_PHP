<?php
namespace App;

/**
* Autoloader charge toute les class dont nous avons besoins.
*/
class Autoloader  // Evite conflit entre __Autoloade et evite le require 
{
		static function register(){ // Fonction qui active lautoloade en tant qu'inplementation de __autoload
			spl_autoload_register(array(__CLASS__, 'autoload')); 
		}

		static function autoload($class)
		{
			if(strpos($class, __NAMESPACE__.'\\') == 0){
				$class = str_replace(__NAMESPACE__.'\\', '', $class);
				$class = str_replace('\\', '/', $class);

				require  __DIR__.'/'.$class.'.php'; //Recupère la classe . PHP
			}
		}
}