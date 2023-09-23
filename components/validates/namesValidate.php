<?php
  /**
     * @param name - name to check
     * This function check name if is valid
     */
    function isValidName($name){
        if(preg_match("/^([a-zA-Z' ]+)$/",$name)){
            return true;
        }else{
            return false; 
        }
    }
?>