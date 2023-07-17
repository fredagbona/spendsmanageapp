<?php
     if(!isset($_SESSION))
     {
         session_start();
     }

     require "../controllers/spends_controller.php";

     $error_msg = addSpend();
 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Ajouter une dépense | Spends Manage</title>
</head>
<body>
<?php
        include_once "../layout.php";
    ?>
   <br><br>
    <section class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-4"></div>
            <div class="col-sm-12 col-md-4 border border-4 p-4">
                <center>
                    <h1>Ajouter une dépense</h1><br>
                </center>
                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <label for="spend_name" class="form-label" >Nom de la dépense : </label><br>
                    <input type="text" class="form-control" name="spend_name" id="spend_name"><br><br>

                    <label for="spend_amount" class="form-label">Montant : </label><br>
                    <input type="number" class="form-control" name="spend_amount" id="spend_amount"><br><br>

                    <input type="submit" class="btn w-100" name="addSpend" value="Enregistrer" style="background-color: #FDD504;"> <br><br>

                    <p style="color: red;">
                        <?php
                        if (isset($error_msg)) {
                            echo $error_msg;
                        } ?>
                    </p>

                </form>
            </div>
            <div class="col-sm-12 col-md-4"></div>
        </div>
    </section>
    
</body>
</html>