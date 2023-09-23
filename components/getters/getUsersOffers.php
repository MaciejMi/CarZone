<?php
    /**
     * @param conn - it's a database connection variable and 
     * @param path - this is path to the error page
     * @param id - it's a user id 
     * getUsersOffers function task is returning a user offers to our page from database.
     */

    function getUsersOffers ($conn, $path, $id){
        try{
            $query = "SELECT cars.*, cars.vin, MAX(images.image) AS image
                        FROM users LEFT OUTER JOIN payments ON users.id = payments.users_id
                                   LEFT OUTER JOIN cars     ON cars.vin = payments.cars_vin
                                   INNER JOIN images   ON images.cars_id = cars.vin
                       WHERE users.id = $id GROUP BY cars.vin;";

            $stmt = $conn -> query($query);
            $result = $stmt -> fetchAll();

            return $result;
        }catch(PDOException $error){
            header('Location: ' . $path);
        }
    }
?>