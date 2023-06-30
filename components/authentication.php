<?php
    function isNullDatas($datas = []){
        foreach($datas as $data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            if ($data == '' || is_null($data)){
                return True;
            }
        }
        return false;
    }

    function arePasswordsEqual($password_1, $password_2){
        if (trim($password_1) === trim($password_2)){
            return True;
        }
        return false;
    }

    function validName($name){
         
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            return False;
        }
        return True;
    }
?>