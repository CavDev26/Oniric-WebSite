<?php
require_once 'bootstrap.php';

if(isset($_POST["username"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare username o password!";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}

if(isUserLoggedIn()){
    // UTENTE LOGGATO
    $templateParams["titolo"] = "Profilo - ".$_SESSION("username");
    $templateParams["nome"] = "login-home.php";
    /*
    if(isset($_GET["formmsg"])){
        $templateParams["formmsg"] = $_GET["formmsg"];
    }*/
}
else{
    // UTENTE NON LOGGATO
    $templateParams["titolo"] = "Oniric - Login";
    $templateParams["nome"] = "login-form.php";
}

require 'template/base.php';
?>