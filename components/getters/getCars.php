<?php
    /**
     * @param conn - it's a database connection variable and 
     * @param path - this is path to the error page
     * @param limit - how many records do you want
     * getCars function task is returning cars to our page from database.
     */

    function getCars ($conn, $path, $limit = 6){
        try{
            $query = "SELECT * 
            FROM cars LEFT OUTER JOIN payments ON cars.vin = payments.cars_vin
                      LEFT OUTER JOIN images   ON cars.vin = images.cars_id GROUP BY cars.vin LIMIT {$limit};";
            $stmt = $conn -> query($query);
            $result = $stmt -> fetchAll();

            return $result;
        }catch(PDOException $error){
            header('Location: ' . $path);
        }
    }
?>