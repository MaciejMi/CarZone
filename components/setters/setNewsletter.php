<?php

    /**
     * @param conn - it's a database connection variable and 
     * @param path - this is path to the error page
     * @param email - this is user email
     */

    function setNewsletter($conn, $path, $email){
        try{
            if (isset($email)){
                if (!is_null($email)){
                    if(trim($email) != ''){
                        $query = "INSERT INTO newsletter(email) VALUES('{$email}')";
                        $stmt = $conn -> query($query);
                    }
                }
            }
        }catch(PDOException $error){
            return;
        }
    }
?>