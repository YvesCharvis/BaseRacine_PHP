<?php
require '../app/Autoloader.php';
App\Autoloader::register();

if (isset($_GET['p'])){
	$page = $_GET['p'];
}else{
	$page = 'home';
}

//initialisation de la base de donnée
$db = new App\Database('newapp'); 

ob_start();

	if($page==='home'){

		require '../pages/home.php';
	}elseif($page=== "article"){
		require '../pages/single.php';
	}elseif($page=== "categorie"){
		require '../pages/categorie.php';
	}else{
		require '../pages/404.php';
	}
	
$content = ob_get_clean();

require '../pages/templates/default.php';
