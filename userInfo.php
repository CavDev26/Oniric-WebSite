<?php
require_once 'bootstrap.php';

//Base Template

$templateParams["titolo"] = "Gestisci i tuoi dati";
$templateParams["nome"] = "modifyUserInfo.php";
$templateParams["js"] = array("./js/togglePassword.js");
$templateParams["style"] = array("./css/login_signup.css", "https://fonts.googleapis.com/icon?family=Material+Icons");
if (isUserLoggedIn()) {
    if(isset($_POST["exit"])) {
        header("Location: login.php");
    }
    if (isset($_POST["deleteMethod"])) {
        $dbh->deleteMethod($_SESSION["username"],$_POST["deleteMethod"]);
    }
    if (isset($_POST["modifyMethod"]) && isset($_POST["mname"]) && isset($_POST["mnumber"]) && isset($_POST["mcircuit"])) {
        $payMethod = array("Numero"=>$_POST["mnumber"], "Nome"=>$_POST["mname"], "Circuito_pagamento"=>$_POST["mcircuit"]);
        $dbh->modifyMethod($_SESSION["username"],$payMethod, $_POST["modifyMethod"]);
    }
    if (isset($_POST["insertMethod"]) && isset($_POST["name"]) && isset($_POST["number"]) && isset($_POST["circuit"])) {
        $payMethod = array("Numero"=>$_POST["number"], "Nome"=>$_POST["name"], "Tassa"=>2.0, "Circuito_pagamento"=>$_POST["circuit"]);
        $dbh->insertNewPayMethod($_SESSION["username"], $payMethod);
    }
// $templateParams["categorie"] = $dbh->getCategories();
// $templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
// //Home Template
// $templateParams["articoli"] = $dbh->getPosts();
}
require 'template/base.php';
?>