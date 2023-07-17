<?php
    $username = 'root';
    $host = 'localhost';
    $password = '';
    $dsn = 'mysql:host=localhost;dbname=spending_database;charset=utf8';

  try
  {
    $connexion = new PDO($dsn, $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connexion réussie !";
  }catch(PDOException $e){
    die("La connexion a échoué : ".$e->getMessage());
    exit();
  }

?>