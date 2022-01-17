<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Oniric - Login";
$templateParams["nome"] = "login-form.php";

if(isset($_POST["username"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare username o password!";
    }
    else{
        registerLoggedUser($login_result[0], strlen($_POST["password"]));
    }
}

if(isUserLoggedIn()){
    
    // UTENTE LOGGATO
    $templateParams["titolo"] = "Profilo - " . $_SESSION["username"];
    $templateParams["nome"] = "profile.php";
    $templateParams["ordini"] = $dbh->getOrders($_SESSION["username"]);
    $templateParams["payMethods"] = $dbh->getPayMethods($_SESSION["username"], 3);
    $templateParams["addresses"] = $dbh->getAddresses($_SESSION["username"]);
    $templateParams["userinfo"] = array("username" => $_SESSION["username"], "namesurname" => $_SESSION["namesurname"], 
                                        "birthdate" => $_SESSION["birthdate"], "passlen" => $_SESSION["passlen"]);
    if(isset($_GET["formmsg"])){
        $templateParams["formmsg"] = $_GET["formmsg"];
    }
}
else{
    // UTENTE NON LOGGATO
    $templateParams["titolo"] = "Oniric - Login";
    $templateParams["nome"] = "login-form.php";
}

require 'template/base.php';
?>