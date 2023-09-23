<?php
    /**
     * @param conn - it's a database connection variable and 
     * @param path - this is path to the error page
     * @param vin - it's a vin of car
     * getCarInformation function task is returning a car to our page from database.
     */

    function getCarInformation ($conn, $path, $vin){
        try{
            $query = "SELECT cars.*, users.*
            FROM cars LEFT OUTER JOIN payments ON cars.vin = payments.cars_vin
                      LEFT OUTER JOIN users    ON users.id = payments.users_id
            WHERE cars.vin = '$vin'";

            $stmt = $conn -> query($query);
            $result = $stmt -> fetch();

            return $result;
        }catch(PDOException $error){
            header('Location: ' . $path);
        }
    }
?>