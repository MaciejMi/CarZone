<?php

// This file is used to search for a error.php file.

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
?>