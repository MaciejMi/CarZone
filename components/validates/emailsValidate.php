<?php
  /**
     * @param name - name to check
     * This function check email if is valid
     */
    function isValidEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false; 
        }
    }
?>