<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Oniric - Login";
$templateParams["nome"] = "login-form.php";
$templateParams["style"] =  array("./css/login_signup.css", "https://fonts.googleapis.com/icon?family=Material+Icons");
$templateParams["js"] = array("./js/togglePassword.js");


if (isset($_POST["exit"])) {
    session_unset();
}
if (isset($_POST["article"])) {
    $_SESSION['article'] = $_POST["article"];
}


if(isset($_POST["username"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if(count($login_result)==0){
        //Login fallito
        $templateParams["errorelogin"] = "Errore! Controllare username o password!";
    }
    else{
        registerLoggedUser($login_result[0], strlen($_POST["password"]));
        $templateParams["js"] = array("./js/accordion.js", "./js/modal.js");
        $templateParams["style"] = array("./css/modal.css", "./css/profile.css", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", "./css/accordion.css");
    }
}
if(isUserLoggedIn()){
    if ($dbh->isAdmin($_SESSION["username"])) {
        $templateParams["admin"] = 1;
    }
    if (isset($_POST["adminuser"])) {
        if (isset($templateParams["admin"])) {
            $dbh->makeAdmin($_POST["adminuser"]);
            $notification = array("ID_Notifica" => generateNotificationId("AD",$_POST["adminuser"]), 
                "Titolo" => "Ora sei amministratore!", "Descrizione" =>$_SESSION["username"]. " ti ha reso amministratore", 
                "Data_Ora" => date("Y-m-d H:i:s"), "Letto" => 0, "ID_Ordine" => null, "Nome_Utente" => $_POST["adminuser"], "Immagine" => "./img/logo-oniric.png");
            $dbh->pushNotification($notification);
        } else {
            $templateParams["error"] = "Non hai i permessi per fare questo";
        }
                
    }
    if(isset($_POST["caddress"]) && isset($_POST["cncivico"]) && isset($_POST["ccitta"])){
        $dbh->deleteAddress($_SESSION["username"], array("Via" => $_POST["caddress"], "Numero_civico" => $_POST["cncivico"], "Citta" => $_POST["ccitta"]));
    }
    if(isset($_POST["address"]) && isset($_POST["ncivico"]) && isset($_POST["citta"])){
        $dbh->insertNewAddress($_SESSION["username"], array("Via" => $_POST["address"], "Numero_civico" => $_POST["ncivico"], "Citta" => $_POST["citta"]));
    }

    if (isset($_SESSION["article"])) {
        header("location: articolo.php?id=". $_SESSION["article"]);
    }
    if (isset($_SESSION["cart"])) {
        header("location: cart.php");
    }
    if (isset($_SESSION["completeOrder"])) {
        header("location: cart.php");
    }
    //forse non va bene
    if (isset($_SESSION["orderHistory"])) {
        header("location: index.php");
    }

    // UTENTE LOGGATO
    $templateParams["titolo"] = "Profilo - " . $_SESSION["username"];
    $templateParams["nome"] = "profile.php";
    $templateParams["orders"] = $dbh->getOrders($_SESSION["username"]);
    $templateParams["payMethods"] = $dbh->getPayMethods($_SESSION["username"], 3);
    $templateParams["addresses"] = $dbh->getAddresses($_SESSION["username"]);
    $templateParams["userinfo"] = array("username" => $_SESSION["username"], "namesurname" => $_SESSION["namesurname"], 
                                        "birthdate" => $_SESSION["birthdate"], "passlen" => $_SESSION["passlen"]);
    $templateParams["balance"] = $dbh->getBalance($_SESSION["username"])[0]["Saldo"];

    if(isset($_POST["valore"])) {
        $dbh->updateSald($_SESSION["username"], $_POST["valore"]);
        header("Location: login.php");
    }

    $templateParams["js"] = array("./js/accordion.js", "./js/modal.js", "./js/shipmentPrices.js");
    $templateParams["style"] = array("./css/completeOrderStyle.css", "./css/modal.css", "./css/profile.css", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", "./css/accordion.css");

}
else{
    // UTENTE NON LOGGATO
    if (isset($_POST["login"])) {
        $templateParams["titolo"] = "Oniric - Login";
        $templateParams["nome"] = "login-form.php";
    }
    else {
        $templateParams["titolo"] = "Oniric - Accesso";
        $templateParams["nome"] = "access-home.php";
    }
}



require 'template/base.php';
?>