<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Oniric - Login";
$templateParams["nome"] = "login-form.php";

if (isset($_POST["exit"])) {
    session_unset();
}
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
    if(isset($_POST["caddress"]) && isset($_POST["cncivico"]) && isset($_POST["ccitta"])){
        $dbh->deleteAddress($_SESSION["username"], array("Via" => $_POST["caddress"], "Numero_civico" => $_POST["cncivico"], "Citta" => $_POST["ccitta"]));
    }
    if(isset($_POST["address"]) && isset($_POST["ncivico"]) && isset($_POST["citta"])){
        $dbh->insertNewAddress($_SESSION["username"], array("Via" => $_POST["address"], "Numero_civico" => $_POST["ncivico"], "Citta" => $_POST["citta"]));
    }
    
    // UTENTE LOGGATO
    $templateParams["titolo"] = "Profilo - " . $_SESSION["username"];
    $templateParams["nome"] = "profile.php";
    $templateParams["orders"] = $dbh->getOrders($_SESSION["username"]);
    $templateParams["payMethods"] = $dbh->getPayMethods($_SESSION["username"], 3);
    $templateParams["addresses"] = $dbh->getAddresses($_SESSION["username"]);
    $templateParams["userinfo"] = array("username" => $_SESSION["username"], "namesurname" => $_SESSION["namesurname"], 
                                        "birthdate" => $_SESSION["birthdate"], "passlen" => $_SESSION["passlen"]);
    $templateParams["balance"] = findBalance($templateParams["payMethods"]);
}
else{
    // UTENTE NON LOGGATO
    $templateParams["titolo"] = "Oniric - Login";
    $templateParams["nome"] = "login-form.php";
}


require 'template/base.php';
?>