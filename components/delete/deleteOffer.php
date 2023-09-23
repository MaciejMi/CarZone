<?php
    session_start();
    require('../connection.php');
    try{
        $vin = $_GET['vin'];
        $id = $_SESSION['userId'];
    
        $query = "SELECT payments.id FROM payments WHERE payments.users_id = $id AND payments.cars_vin = '$vin';";
        $stmt = $conn -> query($query);
        $result = $stmt -> fetch();

        if ($result){
            $query = "DELETE FROM cars WHERE cars.vin = '$vin'";
            $stmt = $conn -> query($query);
        }

        header('Location: ../../site/user-panel/my-offers.php');
    }catch(PDOException $error){
        header('Location: ' . $path);
    }
?>