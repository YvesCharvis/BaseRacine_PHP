<?php
require '../app/Autoloader.php'; 			 //Ont charge la classe Autoloade 

App\Autoloader::register();					// Autoloade depuis le dossier App qui ce situe à la racine  Il app la class autoloader et appl la "fonction" register

$config = App\Config::getInstance();
$app = App\App::getInstance();

$post = App\App::getTable('posts');


$app->getDb();
?>