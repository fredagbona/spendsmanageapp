<?php
     if(!isset($_SESSION))
     {
         session_start();
     }
     require "../controllers/users_controller.php";
     $user = getUserInfos();
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<?php
        include_once "../layout.php";

?><br><br>
 <section class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-4"></div>
            <div class="col-sm-12 col-md-4 border border-4 p-4">
                <center>
                    <h2> <img src="person-circle.svg" width="50" height="50"> Mon Profil</h2><br><br>
                </center>
                <h3>Nom : <?= $user['pseudo'] ?> </h3><br>
                <h3>Adresse Email : <?= $user['adresse_email'] ?> </h3><br>
            </div>
            <div class="col-sm-12 col-md-4"></div>
        </div>
    </section>
    
    <div class="toast align-items-center text-bg-primary" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      Hello, world! This is a toast message.
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>




    
</body>
</html>