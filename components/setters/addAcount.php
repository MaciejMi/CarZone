<?php

   /**
    * @param conn - it's a database connection variable and 
    * @param path - this is path to the error page
    * @param datas - this is array with datas about user (lastname, firstname, email, phone number, password, password)
    */
    
function addAcount($conn, $path, $datas){
        try{
            foreach($datas as $data){
                if (is_null($data)){
                    return "You didn't complete everything!";}}
            if (!(isValidName($datas['firstname']) AND isValidName($datas['lastname']))){
                return "You have entered an incorrect name or surname";}
            if (!(isValidEmail($datas['email']))){
                return "You have entered an incorrect email";}
            if (!($datas['password_1'] == $datas['password_2'])){
                return "You haven't entered same passwords";}
            $stmt = $conn -> query('SELECT users.id FROM users WHERE users.email = "' . $datas["email"] . '";');$result = $stmt -> fetch();

                if ($result){
                    return "This email is already used!";
                }

                $hash = password_hash($datas['password_1'], PASSWORD_DEFAULT);
                $tmp_img = file_get_contents($datas['image']['tmp_name']);

                $stmt= "INSERT INTO users(id, firstname, lastname, phone_number, email, passhash, image, profile_description)
                VALUES (NULL, ?, ? , ? , ? , ? , ? , NULL);"; 

                $queryt = $conn->prepare($stmt);
                $queryt->bindParam(1, $datas['firstname']);
                $queryt->bindParam(2, $datas['lastname']);
                $queryt->bindParam(3, $datas['phone_number']);
                $queryt->bindParam(4, $datas['email']);
                $queryt->bindParam(5, $hash);
                $queryt->bindParam(6, $tmp_img);
                $queryt->execute();


            header('Location: ./login.php');
        }catch(PDOException $error){
            return 'You cannot review the same user!';
        }

    }
?>