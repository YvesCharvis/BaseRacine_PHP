<?php
use App\Tables\PostsTable;
use App\Autoloader;
use App\App;

require '../app/Autoloader.php';

Autoloader::register();

$app = App::getInstance();
$db = $app->getDb();

$posts = new PostsTable($db);
var_dump($posts);