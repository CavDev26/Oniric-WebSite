<?php
require_once 'bootstrap.php';

unset($_SESSION["orderHistory"]);

if(isUserLoggedIn()){
    $templateParams["titolo"] = "Order History";
    $templateParams["nome"] = "orderHistoryTemplate.php";
    $templateParams["id"] = $_GET["id"];
    
    if(isset($_GET["profile"])) {
        $_SESSION["profile"] = 1;
    }
    if (isset($_POST["exit"])) {
        if (isset($_SESSION["profile"])) {
            header("Location: login.php");
        } else {
            header("Location: orderList.php");
        }
        
    }

    $templateParams["ordine"] = $dbh->getOrderByID($_SESSION["username"], $templateParams["id"]);
    if(count($templateParams["ordine"]) == 0) {
        $templateParams["erroreHistory"] = "Oooops non esiste questo ordine...";
    } else {
        $templateParams["ordine"] = $templateParams["ordine"][0];

        $templateParams["dettagliearticoli"] = $dbh->getDettagliSpedizioneandArticoli($templateParams["id"]);
        
        $templateParams["sped"] = $dbh->getTIpoSpedizione($templateParams["dettagliearticoli"][0]["ID_Tipo_Sped"]);
        $templateParams["sped"] = $templateParams["sped"][0];
    }

    $templateParams["style"] = array("./css/framework.css", "./css/cartStyle.css",
    "./css/buttons.css", "./css/modal.css", "./css/profile.css", "./css/accordion.css",
    "./css/completeOrderStyle.css",  "./css/searchResults.css",  "./css/ordineHistory.css");
    $templateParams["js"] = array("./js/accordion.js", "./js/modal.js");
} else {
    $_SESSION["orderHistory"] = "history";
    header("Location: login.php");
}

require 'template/base.php';
?>