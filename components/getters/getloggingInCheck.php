<?php
    /**
     * @param conn - it's a database connection variable and 
     * @param path - this is path to the error page
     * @param email - user's email
     * @param password - user's password
     * getloggingInCheck checks whether we have provided correct data and returns a true or false result along with the messages
     * @return array
     */
    function getloggingInCheck($conn, $path, $email, $password){
        try{
            $data = array(
                'email' => $email ?? NULL,
                'password' => $password ?? NULL
            );
        
            if (is_null($password) or is_null($email)){
                $resultArray = array(
                    'isLogged' => false,
                );
                
            }else{
                $query = "SELECT users.id, users.firstname, users.lastname, users.email, users.image, users.passhash FROM users WHERE  users.email = '" . $data['email'] .  "';";
                $stmt = $conn -> query($query);
                $result = $stmt -> fetch();
                if ($result){
                    if (password_verify(trim($data['password']), $result['passhash'])){
                        $resultArray = array(
                            'isLogged' => true,
                            'userId' => $result['id'],
                            'email' => $result['email'],
                            'image' => $result['image'],
                            'firstname' => $result['firstname'],
                            'lastname' => $result['lastname'],
                            'message' => 'You are logged in!',
                        );
                    }else{
                        $resultArray = array(
                            'isLogged' => false,
                            'message' => 'Incorrect password'
                        );
                    }
                }else{
                    $resultArray = array(
                        'isLogged' => false,
                        'message' => 'The email does not exist.'
                    );
                }
            }
            return $resultArray;


        }catch(PDOException $error){
            header('Location: ' . $path);
        }
    }


?>