<?php
    /**
     * @param conn - it's a database connection variable and 
     * @param path - this is path to the error page
     * @param id - it's a user id 
     * getAverageStar function task is returning a average of star reviews to our page from database.
     */

    function getAverageStar ($conn, $path, $id){
        try{
            $query = "SELECT AVG(reviews.star)
                  FROM users LEFT OUTER JOIN reviews ON reviews.author_id = users.id
                  WHERE reviews.user_id = $id;";

            $stmt = $conn -> query($query);
            $result = $stmt -> fetch();

            return round($result[0]);

        }catch(PDOException $error){
            header('Location: ' . $path);
        }
    }
?>