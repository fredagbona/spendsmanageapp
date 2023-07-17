<?php
     if(!isset($_SESSION))
     {
         session_start();
     }
     require "../controllers/spends_controller.php";
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <?php
        include_once "../layout.php";
    ?>
    
</body>
</html>