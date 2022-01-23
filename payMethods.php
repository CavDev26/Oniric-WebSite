<?php
require_once 'bootstrap.php';

//Base Template

$templateParams["titolo"] = "Gestisci le tue carte";
$templateParams["nome"] = "modifyPayMethods.php";
$templateParams["js"] = array("./js/accordion.js","./js/modal.js");
$templateParams["style"] = array("./css/productStyle.css","./css/login_signup.css","./css/style.css","./css/profile.css","./css/framework.css",
                                "./css/modal.css","./css/text.css","./css/buttons.css","./css/accordion.css","./css/completeOrderStyle.css",
                                "./css/cartStyle.css","./css/paymentMethods.css");
if (isUserLoggedIn()) {
    if (isset($_POST["completeOrder"])) {
        $_SESSION["completeOrder"] = $_SESSION["completeOrder"];
    } elseif (isset($_POST["profile"])) {
        $_SESSION["profile"] = $_POST["profile"];
    }
    if(isset($_POST["exit"])) {
        if (isset($_SESSION["completeOrder"])) {
        unset($_SESSION["completeOrder"]);
        header("Location: completeOrder.php");
    }
    if (isset($_SESSION["profile"])) {
        unset($_SESSION["profile"]);
        header("Location: login.php");
    }
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
    $templateParams["payMethods"] = $dbh->getPayMethods($_SESSION["username"]);
// $templateParams["categorie"] = $dbh->getCategories();
// $templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
// //Home Template
// $templateParams["articoli"] = $dbh->getPosts();
}
require 'template/base.php';
?>