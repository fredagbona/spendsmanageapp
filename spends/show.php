<?php
     if(!isset($_SESSION))
     {
         session_start();
     }
     require "../controllers/spends_controller.php";

     if(isset($_GET['id'])){
        $spend = getSpend($_GET['id']);
     }
   
 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Détails Dépense | SpendsManage</title>
</head>
<body>
    <?php
        include_once "../layout.php";
    ?> <br><br>
    <section class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-4"></div>
            <div class="col-sm-12 col-md-4 border border-4 p-4">
                <center>
                <h2>Détails dépense</h2><br>
                </center>
                <div class="float-start">
                    <p> <?= $spend['spend_name'] ?> </p>
                </div>
                <div class="float-end">
                    <p> <?= $spend['amount'] ?> F</p>
                </div><br><br>

                <a href="paid.php?id=<?= $spend['id'] ?>" class=" btn w-100" style="background-color: #FDD504;">PAYER</a><br><br>
                <a href="del.php?id=<?= $spend['id'] ?>" class="btn btn-dark w-100">SUPPRIMER</a><br><br>
            </div>
            <div class="col-sm-12 col-md-4"></div>
        </div>
    </section>
</body>
</html>