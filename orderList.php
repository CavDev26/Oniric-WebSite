<?php
require_once 'bootstrap.php';
unset($_SESSION["completeOrder"]);

if(isUserLoggedIn()){
    $templateParams["titolo"] = "Purchased items";
    $templateParams["nome"] = "orderListTemplate.php";

    $templateParams["datiOrdine"] = array($dbh->getAllOrdersByUsername($_SESSION["username"]));
    $templateParams["datiOrdine"] = $templateParams["datiOrdine"][0];
    // echo $$templateParams["datiOrdine"][0]["ID_Ordine"];
    // echo "   ";
    // echo $$templateParams["datiOrdine"][0]["Nome"];
    // echo "   ";
    // echo $$templateParams["datiOrdine"][0]["Status_Ordine"];
    



    $templateParams["style"] = array("./css/productStyle.css", "./css/framework.css", "./css/cartStyle.css",
                                    "./css/buttons.css", "./css/modal.css", "./css/profile.css", "./css/accordion.css",
                                    "./css/completeOrderStyle.css",  "./css/searchResults.css",  "./css/ordineHistory.css", "./css/orderListStyle.css");
    $templateParams["js"] = array("./js/accordion.js", "./js/modal.js");
}
require 'template/base.php';
?>