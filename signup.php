<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Oniric - Registrazione";
$templateParams["nome"] = "signup-form.php";
$templateParams["style"] = array("./css/login_signup.css", "https://fonts.googleapis.com/icon?family=Material+Icons");
$templateParams["js"] = array("./js/togglePassword.js");

if(isset($_POST["username"]) && isset($_POST["password"])){
    if ($_POST["password"] != $_POST["confirmpassword"]) {
        $templateParams["erroresignup"] = "Errore: le password non corrispondono";
    }
    else {
        $exists = $dbh->checkUserExists($_POST["username"]);
        if($exists) {
            $templateParams["erroresignup"] = "Errore: esiste già un utente con quel nome";
        }
        else {
            $nameAndSurname = explode(" ", $_POST["nameAndsurname"]);
            $result = $dbh->registerUser($_POST["email"], $nameAndSurname[0], $nameAndSurname[1], $_POST["username"], $_POST["password"], $_POST["birthdate"]);
            if (!$result) {
                //registrazione avvenuta con successo
                $templateParams["nome"] = "signup-success.php";
            } else {
                $templateParams["erroresignup"] = "Errore: qualcosa è andato storto";
            }
        }
    }
    
    //$login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    /*if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare username o password!";
    }
    else{
        registerLoggedUser($login_result[0]);
    }*/
}

require 'template/base.php';
?>