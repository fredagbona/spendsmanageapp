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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Payer une dépense | SpendsManage</title>
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
                    <h1>Envoyer</h1><br>
                </center>
                <form action="../api/createaccesstoken.php" method="post">
                    <label for="amount" class="form-label">Montant: </label><br>
                    <input type="number" class="form-control" name="amount" value="<?= $spend['amount'] ?>" readonly><br><br>
                    
                    <label for="tel" class="form-label">Numéro <span class="text-danger">*</span> : </label><br>
                    <input type="number" class="form-control" name="number" placeholder="Ex: 22956535957" required><br><br>

                    <input type="submit" class="btn w-100" value="Envoyer" style="background-color: #FDD504;">
                </form>
            </div>
            <div class="col-sm-12 col-md-4"></div>
        </div>
    </section>
   
</body>
</html>