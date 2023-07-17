<?php
   require "controllers/useful_scripts.php";
   require "models/database.php";

    if(isset($_GET['page'])){
        $page = $_GET['page'];
        if($page == "spends"){
            header('Location: spends/spends.php');
        }
        if($page == "newspend"){
            header('Location: spends/new.php');
        }
        if($page == "register"){
            header('Location: users/sign_up.php');
        }
        if($page == "login"){
            header('Location: users/sign_in.php');
        }
        if($page == "showuser"){
            header('Location: users/show.php');
        }
        if($page == "logout"){
            header('Location: users/logout.php');
        }
    }
 

?>
