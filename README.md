##FAIRE DES APPELS A DES FICHIER EXTERIEUR DE PUBLIC##

#NOTE:


-Architecture:


-web ----------------- |-css
                       |-js
                       |-index.php    ------> Autoloader <?php
                                                        require '../app/Autoloader.php';
                                                        ?>

-app ------- |-Autoloader.php
             |-Database.php


-pages ------- |-home.php
               |-template -----------|
               |                     |-Default.php
               |-single.php



##PDO

//Conexion mSQL

$pdo = new PDO('mysql:dbname=newapp;host=localhost;charset=UTF8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->exec('INSERT INTO articles SET titre="mon titre", date="'.date('Y-m-d H:i:s').'"');

echo "ok c'\est bon";

///////////////////////////////////////////////////////////////////////////////

##PDO afficher Article
<?php
$statement = $pdo->query('SELECT * FROM articles');
$datas =$statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php foreach ($datas as $post): ?>
    <li>
        <a href="index.php?p=article&id=<?= $post->id;?><?=$post->titre;?"></a>
    </li>
<?pfp endforeach; ?>

////////////////////////////////////////////////////////////////////////////

*
L'objectif es de mettre des articles dans une base de données, 
Et de les chargés et les mettre en formes automatiquements, et avoir une mains facile sur les modifications. *




