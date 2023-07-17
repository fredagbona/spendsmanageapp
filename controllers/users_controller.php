<?php

    require "../models/database.php";
    require "useful_scripts.php";

    function createUser(){
        global $connexion;
        if(isset($_POST['signup'])){
            if(!empty($_POST["name"])){
                if(!empty($_POST["motdepasse"])){
                    if(!empty($_POST["email"])){
                        $name = cleanString($_POST["name"]);
                        $motDePasse = cryptPwd($_POST["motdepasse"]);
                        $verifie_email = cleanEmail(($_POST["email"]));
                        if($verifie_email){
                                $email = $_POST["email"];
                               
                                $req = 'SELECT * FROM users WHERE adresse_email = ?';
                               
                               
                                $req_user = $connexion->prepare($req);
                              
                                $connexion->exec("USE spending_database");
        
                                $req_user->execute(array($email));
        
                              
        
                               
                                            $user_trouv = $req_user->fetch();
        
                                            if(!$user_trouv){
                                                                                                                                $createUser =               $connexion->prepare("INSERT INTO users(pseudo, adresse_email, motdepasse) VALUES(?, ?, ?)");
                                                $connexion->exec("USE spending_database");
                                                $createUser->execute(array($name, $email, $motDePasse
                                            ));
                                                header('Location: ../traitement.php?page=login');
                                            }else{
                                                return "Adresse Email déjà utilisé";
                                            }
                                    }else{
                                        return "Adresse email incorrect !";
                                    }
                                }else{
                                    return "L'email ne peut pas être vide !";
                                }
                            }else{
                                return "Le mot de passe ne peut pas être vide !";
                            }
                        }else{
                            return "Le nom d'utilisateur ne peut pas être vide !";
                        }
                    }
        
    }

    function signIn(){
        global $connexion;
        $name = $motDePasse = "";
        if(isset($_POST['signin'])){
            if(!empty($_POST["name"])){
                if(!empty($_POST["motdepasse"])){
                
                        $name = cleanString($_POST["name"]);
                        $motDePasse = cryptPwd($_POST["motdepasse"]);
                        $req_user = $connexion->prepare("SELECT * FROM users where pseudo = ? AND motdepasse = ?");
                        $req_user->execute(array($name,$motDePasse));
                        $user_trouv = $req_user->rowCount();
                        if($user_trouv == 1)
                        {
                            $user_info = $req_user->fetch();
                            $_SESSION['id'] = $user_info['id'];
                            $_SESSION['pseudo'] = $user_info['pseudo'];
                            $_SESSION['adresse_email'] = $user_info['adresse_email'];
                            $_SESSION['date'] = $user_info['date_creation_compte'];
        
                            header("location: ../traitement.php?page=spends");
        
                        }else
                        {
                           return "Combinaison EMail/Mot de passe incorrect";
                        }
                    }else{
                       return"Le mot de passe ne peut pas être vide !";
                    }
                }else{
                        return "Le nom d'utilisateur ne peut pas être vide !";
                }
            }
            
            }

            function getUserInfos(){
                global $connexion;
                $req_userInfos = $connexion->prepare("SELECT * FROM users WHERE id = ?");
                $req_userInfos->execute(array($_SESSION['id']));
                $user_info = $req_userInfos->fetch();
                return $user_info;
            }

            function logout(){
                session_destroy();
                header("location: ../traitement.php?page=login");

            }

            function authorised(){
                if(isset($_SESSION['id'])){
                    header("location: ../traitement.php?page=spends");
                }else{
                    header("location: ../traitement.php?page=login");
                }
            }

?>