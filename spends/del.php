<?php
     if(!isset($_SESSION))
     {
         session_start();
     }
     require "../controllers/spends_controller.php";
     if(isset($_GET['id'])){
        del($_GET['id']);
     }
?>