<?php

    /**
     * @param conn - it's a database connection variable and 
     * @param path - this is path to the error page
     * @param datas - this is array with datas which we want to update 
     */

    function updateAccount($conn, $path, $datas){
        try{
            foreach($datas as $data){
                if (is_null($data)){
                    return "You didn't complete everything!";
                }
            }
            if (!(isValidName($datas['firstname']) AND isValidName($datas['lastname']))){
                return "You have entered an incorrect name or surname";
            }

            $id = $datas['id'];
            $firstname = $datas['firstname']; 
            $lastname = $datas['lastname']; 
            $phone_number = $datas['phone_number']; 
            $description = $datas['description']; 

            $query = "UPDATE users SET users.firstname = '$firstname', users.lastname = '$lastname', users.phone_number = '$phone_number', users.profile_description = '$description' WHERE users.id = $id";

            $conn -> query($query);

            $_SESSION['firstname'] = $firstname; $_SESSION['lastname'] = $lastname;
            
            if (isset($datas['image'])){
                if (!is_null($datas['image']['tmp_name'])){
                    if ($datas['image']['tmp_name'] != ''){
                        $tmp_img = file_get_contents($datas['image']['tmp_name']);
                        $stmt= "UPDATE users SET users.image = ? WHERE users.id = $id"; 
            
                        $queryt = $conn->prepare($stmt);
                        $queryt->bindParam(1, $tmp_img);
                        $queryt->execute();
            
                        $_SESSION['image'] = $tmp_img;
                    }    
                }
            }


            header('Location: ./index.php');
            return;
        }catch(PDOException $error){
            return 'You cannot change your data!';
        }
    }
?>