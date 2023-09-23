<?php
    /**
     * @param conn - it's a database connection variable and 
     * @param path - this is path to the error page
     * @param vin - it's a vin of car
     * getCarImages function task is returning a car to our page from database.
     */

    function getCarImages ($conn, $path, $vin){
        try{
            $query = "SELECT images.image
            FROM cars LEFT OUTER JOIN images ON images.cars_id = cars.vin
            WHERE cars.vin = '$vin'";

            $stmt = $conn -> query($query);
            $result = $stmt -> fetchAll();

            return $result;
        }catch(PDOException $error){
            header('Location: ' . $path);
        }
    }
?>