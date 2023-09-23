<?php
    /**
     * @param conn - it's a database connection variable and 
     * @param path - this is path to the error page
     * @param info - is the thing you want to search for 
     * getInfoAboutCar function task is returning a info about part of car information to our page from database.
     */

    function getInfoAboutCar ($conn, $path, $info){
        try{
            $query = "SELECT cars.{$info} FROM cars GROUP BY $info;";

            $stmt = $conn -> query($query);
            $result = $stmt -> fetchAll();

            return $result;

        }catch(PDOException $error){
            header('Location: ' . $path);
        }
    }
?>