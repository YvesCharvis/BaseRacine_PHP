<?php
require '../app/Autoloader.php'; 			 //Ont charge la classe Autoloade 

App\Autoloader::register();					// Autoloade depuis le dossier App qui ce situe à la racine  Il app la class autoloader et appl la "fonction" register

if (isset($_GET['p'])){
	$page = $_GET['p'];
}else{ 										// Si GET n'est pas P ont renvoie sur home
	$page = 'home';
}

//initialisation de la base de donnée
$db = new App\Database('newapp'); 			// Recup la base de donner avec son nom 

ob_start();									// Charge en temporaire, elle ne seront pas afficher ! Mais charger en cache

	if($page==='home'){ 					// renvoi du else a GET p

		require '../pages/home.php'; 		// Appelle la pas home depuis pages
	}elseif($page=== "article"){
		require '../pages/single.php'; 		// **
	}elseif($page=== "categorie"){
		require '../pages/categorie.php'; 	// **
	}else{
		require '../pages/404.php'; 		// **
	}
	
$content = ob_get_clean(); 					//Lis le contenu de tout le cache et l'efface

require '../pages/templates/default.php';  	// La structure de base html 
