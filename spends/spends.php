<?php
     if(!isset($_SESSION))
     {
         session_start();
     }
     
     require "../controllers/spends_controller.php";
   
     $spends = getAllSpends();
     if(isset($_GET['success'])){
        $message = "Paiement effectué";
     }
     
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Mes Dépenses | SpendsManage</title>
</head>
<body>
<?php
        include_once "../layout.php";
    ?>
   
<br>
    
    <section class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <h3 class="bg-success text-center text-light"> <?php if(isset($message)){
                    echo $message;
                } ?> </h3>
            </div>
            <div class="col-sm-12 col-md-4">
                <center>
                <h2>MES DÉPENSES</h2><br>
                </center>
            <table class="table table-striped" >
        <thead >
            <tr>
            <th scope="col" style="background-color: #FDD504;">Budget </th>
            <th scope="col" style="background-color: #FDD504;"> </th>
            <th colspan="3" style="background-color: #FDD504;"> <a href="new.php"><img src="plus.svg" width="30" height="30">
            </a></th>
            </tr>
        </thead>
        <?php 
            foreach($spends as $spend){

            ?>
        <tbody >
            <tr>
            <td><?= $spend->spend_name ?></td>
            <td><?= $spend->amount ?> F</td>
            <td><a href="show.php?id=<?=$spend->id?>" style=" text-decoration:none;">Voir la dépense</a></td>
            </tr>
        </tbody>
        <?php
            }
        ?>
    </table>
            </div>
            <div class="col-sm-12 col-md-4"></div>
        </div>
    </section>
   

</body>
</html>