<?php
    /**
     * @param conn - it's a database connection variable and 
     * @param path - this is path to the error page
     * @param id - it's a user id 
     * getUserReviews function task is returning a user reviews to our page from database.
     */

    function getUserReviews ($conn, $path, $id){
        try{
            $query = "SELECT reviews.descript, 
                             reviews.star,
                             users.firstname,
                             users.lastname,
                             users.image,
                             users.id
                  FROM users LEFT OUTER JOIN reviews ON reviews.author_id = users.id
                  WHERE reviews.user_id = $id;";

            $stmt = $conn -> query($query);
            $result = $stmt -> fetchAll();

            return $result;
        }catch(PDOException $error){
            header('Location: ' . $path);
        }
    }
?>