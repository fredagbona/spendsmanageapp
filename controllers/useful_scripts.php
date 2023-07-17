<?php
    function cleanString($var){
        return trim(stripslashes(htmlspecialchars($var))) ;
    }
    function cleanEmail($var){
        $sanitizedEmail = filter_var($var, FILTER_SANITIZE_EMAIL);
        $isValidEmail = filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL);
        return $isValidEmail !== false;
    }
    function cryptPwd($var){
        return hash('sha1', $var);
    }

   
?>