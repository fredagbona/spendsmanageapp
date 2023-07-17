<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    require "useful_scripts.php";
    require "../models/database.php";
   
    function addSpend(){
        global $connexion;
        if(isset($_POST['addSpend'])){
            if(!empty($_POST['spend_name'])){
                if(!empty($_POST['spend_amount'])){
                    $spend_name = cleanString($_POST['spend_name']);
                    $spend_amount = $_POST['spend_amount'];
                    $req = 'SELECT * FROM spends WHERE spend_name = ?';
                    $req_spend = $connexion->prepare($req);
                    $connexion->exec("USE spending_database");
                    $req_spend->execute(array($spend_name));
                    $spend_found = $req_spend->fetch();
                    if(!$spend_found){
                        $createSpend = $connexion->prepare("INSERT INTO spends(spend_name, amount,user_id) VALUES(?, ?, ?)");
                        $connexion->exec("USE spending_database");
                        $createSpend->execute(array($spend_name, $spend_amount, $_SESSION['id']));
                        header("location: ../traitement.php?page=spends");
                    }else{
                        return "Dépense existante !";
                    }
                }else{
                    return "Le montant de la dépense ne peut pas être null";
                }
            }else{
                return "Le nom de la dépense ne peut pas être nulle";
            }
        }
    }

    function getAllSpends(){
        global $connexion;
        $req_spends = $connexion->prepare("SELECT * FROM spends WHERE user_id = ? ORDER BY created_at DESC");
        $connexion->exec("USE spending_database");
        $req_spends->execute(array($_SESSION['id']));
        $spends = [];
        while($rows = $req_spends->fetchObject()){
            $spends[] = $rows;
        }
        return $spends;

    }

    function getSpend($var){
        global $connexion;
        $req_spend = $connexion->prepare("SELECT * FROM spends WHERE id = ?");
        $connexion->exec("USE spending_database");
        $req_spend->execute(array($var));
        return $req_spend->fetch();
    }

    function del($var){
        global $connexion;
        $del_spend = $connexion->prepare("DELETE  FROM spends WHERE id = ?");
        $connexion->exec("USE spending_database");
        $del_spend->execute(array($var));
        header("location: ../traitement.php?page=spends");
    }
    function authorised(){
        if(isset($_SESSION['id'])){
            header("location: ../traitement.php?page=spends");
        }else{
            header("location: ../traitement.php?page=login");
        }
    }
   

?>