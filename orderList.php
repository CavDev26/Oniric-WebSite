<?php
require_once 'bootstrap.php';
unset($_SESSION["completeOrder"]);

if(isUserLoggedIn()){
    $templateParams["titolo"] = "Purchased items";
    $templateParams["nome"] = "orderListTemplate.php";

    if (isset($_POST["orders"])) {
        $_SESSION["orders"] = $_POST["orders"];
    }
    if(isset($_POST["exit"])) {
        if (isset($_SESSION["orders"])) {
            unset($_SESSION["orders"]);
            header("Location: login.php");
        }
    }


    $templateParams["datiOrdine"] = array($dbh->getAllOrdersByUsername($_SESSION["username"]));
    $templateParams["datiOrdine"] = $templateParams["datiOrdine"][0];

    if(count($templateParams["datiOrdine"]) == 0) {
        $templateParams["nessunacquisto"] = "E' cosi' vuoto qui... Che aspetti? Corri ad acquistare!";
    }

    $templateParams["style"] = array("./css/productStyle.css", "./css/framework.css", "./css/cartStyle.css",
                                    "./css/buttons.css", "./css/modal.css", "./css/profile.css", "./css/accordion.css",
                                    "./css/completeOrderStyle.css",  "./css/searchResults.css",  "./css/ordineHistory.css", "./css/orderListStyle.css");
    $templateParams["js"] = array("./js/accordion.js", "./js/modal.js");
}
require 'template/base.php';
?>