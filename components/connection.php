<?php

// In this file we connect to our database. If you have some problem with connection to database please check your datas and change it in this file.

define ('USER', 'root');
define ('PASSWORD', '');
define ('HOST', 'localhost');
define ('DATABASE', 'carzone_db');
define ('PORT', "4306");
define('SYSTEM', 'mysql');

require_once('errorPath.php');

try{
    $conn = new PDO(SYSTEM . ":host=" . HOST . ':' . PORT . ";dbname=" . DATABASE, USER, PASSWORD);
}catch(PDOException $error){
    header('Location: ' . $path);
}
?>