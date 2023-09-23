<?php
    /**
     * @param conn - it's a database connection variable and 
     * @param path - this is path to the error page
     * @param id - it's a user id 
     * getCarInformation function task is returning a car to our page from database.
     */

    function getUserInformation ($conn, $path, $id){
        try{
            $query = "SELECT users.*
                        FROM users
                        WHERE users.id = $id";

            $stmt = $conn -> query($query);
            $result = $stmt -> fetch();

            return $result;
        }catch(PDOException $error){
            header('Location: ' . $path);
        }
    }
?>