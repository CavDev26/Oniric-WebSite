<?php
require_once 'bootstrap.php';

unset($_SESSION["orderHistory"]);

if(isUserLoggedIn()){
    $templateParams["titolo"] = "Order History";
    $templateParams["nome"] = "orderHistoryTemplate.php";

    $templateParams["id"] = "pquQf2"; //da fixare poi

    $templateParams["ordine"] = $dbh->getOrderByID($_SESSION["username"], $templateParams["id"]);
    $templateParams["ordine"] = $templateParams["ordine"][0];

    $templateParams["dettagliearticoli"] = $dbh->getDettagliSpedizioneandArticoli($templateParams["id"]);
    
    $templateParams["sped"] = $dbh->getTIpoSpedizione($templateParams["dettagliearticoli"][0]["ID_Tipo_Sped"]);
    $templateParams["sped"] = $templateParams["sped"][0];


    $templateParams["style"] = array("./css/framework.css", "./css/cartStyle.css",
    "./css/buttons.css", "./css/modal.css", "./css/profile.css", "./css/accordion.css",
    "./css/completeOrderStyle.css",  "./css/searchResults.css",  "./css/ordineHistory.css");
    $templateParams["js"] = array("./js/accordion.js", "./js/modal.js", "./js/orderStatus.js");
} else {
    $_SESSION["orderHistory"] = "historyr";
    header("Location: login.php");
}

require 'template/base.php';
?>