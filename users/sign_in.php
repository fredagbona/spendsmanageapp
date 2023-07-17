<?php
if(!isset($_SESSION))
{
    session_start();
}

require "../controllers/users_controller.php";

$error_msg = signIn();
   
                                
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>S'inscrire | SpendsManage</title>
</head>

<body>
<?php
        include_once "../layout.php";
    ?>
     <section class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-4"></div>
            <div class="col-sm-12 col-md-4 border border-4 p-4">
                <center>
                <h2>Connexion</h2> <br>
                </center>
                
                <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label for="name" class="form-label">Nom d'utilisateur : </label><br>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Ex : Jean68"><br><br>


                    <label for="motdepasse" class="form-label">Mot de passe : </label><br>
                    <input type="password" class="form-control" name="motdepasse" id="motdepasse"> <br><br>

                    <input type="submit" class="btn" name="signin" value="Se connecter" style="background-color: #FDD504;"><br><br>
                </form>
                <p style="color: red;">
                    <?php
                    if (isset($error_msg)) {
                        echo $error_msg;
                    } ?>
                </p>

                <a href="../traitement.php?page=register" style="color: #000;">Vous n'avez pas un compte ? Inscrivez-vous ici !</a><br>
            </div>
            <div class="col-sm-12 col-md-4"></div>
        </div>
    </section>
    
   

</body>

</html>