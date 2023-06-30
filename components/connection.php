<?php
define ('USER', 'root');
define ('PASSWORD', '');
define ('HOST', 'localhost');
define ('DATABASE', 'carzone_db');
define('SYSTEM', 'mysql');

$path = './';

while (!(array_search('components', scandir($path)))){
    if ($path == './'){
        $path = '../';
    }else{
        $path = '../' . $path;
    }
}
if (array_search('components', scandir($path))){
    $path = $path . 'components/error.php';
}

try{
    $conn = new PDO(SYSTEM . ":host=" . HOST . ";dbname=" . DATABASE, USER, PASSWORD);
}catch(PDOException $error){
    header('Location: ' . $path);
}
?>