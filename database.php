<?php
$Server = "localhost";
$Database = "php_login_database";
$User = 'PHPLOG';
$Pass='.....';

try{
    $DSN = "mysql:host=$Server;dbname=$Database";
$oConex = new PDO($DSN , $User , $Pass);
$oConex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "¡Error!: " . $e ->getMessage();
}