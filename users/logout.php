<?php
     if(!isset($_SESSION))
     {
         session_start();
     }
     require "../controllers/users_controller.php";
     logout();
 
?>