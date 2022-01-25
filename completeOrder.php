<?php
require_once 'bootstrap.php';
unset($_SESSION["completeOrder"]);

if(isUserLoggedIn()){
    $templateParams["titolo"] = "Complete Order";
    $templateParams["nome"] = "completeOrderForm.php";

    if(isset($_POST["quantity"])) {
        $_SESSION["quantities"] = $_POST["quantity"];
    }

    $templateParams["quantities"] = $_SESSION["quantities"];

    $templateParams["articles"] = array($dbh->getArticlesInCart($_SESSION["username"]));
    $templateParams["articles"] = $templateParams["articles"][0];

    if(count($templateParams["articles"]) == 0) {
        $templateParams["erroreOrdine"] = "Oh- Oh, non dovresti proprio essere qui sai? Meglio che torni indietro vala'";
    } else {
        $templateParams["shipmentMethods"] = array($dbh ->getShipmentMethods());
        $templateParams["shipmentMethods"] = $templateParams["shipmentMethods"][0];

        $templateParams["namesurname"] = $dbh ->getNameSurname($_SESSION["username"]);
        $templateParams["namesurname"] = $templateParams["namesurname"][0];


        if(isset($_POST["valore"])) {
            $dbh->updateSald($_SESSION["username"], $_POST["valore"]);
            header("Location: completeOrder.php");
        }

        $templateParams["balance"] = $dbh ->getBalance($_SESSION["username"]);
        $templateParams["balance"] = $templateParams["balance"][0];

        $templateParams["addresses"] = $dbh ->getAddresses($_SESSION["username"]);

        if(isset($_POST["caddress"]) && isset($_POST["cncivico"]) && isset($_POST["ccitta"])){
            $dbh->deleteAddress($_SESSION["username"], array("Via" => $_POST["caddress"], "Numero_civico" => $_POST["cncivico"], "Citta" => $_POST["ccitta"]));
        }
        if(isset($_POST["address"]) && isset($_POST["ncivico"]) && isset($_POST["citta"])){
            $dbh->insertNewAddress($_SESSION["username"], array("Via" => $_POST["address"], "Numero_civico" => $_POST["ncivico"], "Citta" => $_POST["citta"]));
        }
        $templateParams["paymentMethods"] = $dbh ->getPayMethods($_SESSION["username"], );

        if( isset($_POST["addr"]) && isset($_POST["ship-meth"]) ) {
            $templateParams["shipMethod"] = $dbh->getShipmentMethodsByID($_POST["ship-meth"]);
            $templateParams["shipMethod"] = $templateParams["shipMethod"][0];
            $templateParams["addressCurrent"] = $_POST["addr"];
            $templateParams["randomIDOrder"] = generateRandomOrderID(6);

            $dbh->addOrder($templateParams["randomIDOrder"], $templateParams["addressCurrent"], (float)getTotalWithShip($templateParams["articles"], $templateParams["shipMethod"]["Tariffa"], $templateParams["quantities"]) , $_SESSION["username"]);
            $i = 0;
            foreach ($templateParams["articles"] as $article) {
                for($j=0; $j<$templateParams["quantities"][$i]; $j++) {
                    $templateParams["randomIDSped"] =  generateRandomSpedID(3);
                    $dbh->addDettaglioSpedizione($templateParams["randomIDSped"], $templateParams["shipMethod"]["Tariffa"], $templateParams["addressCurrent"], "Ricevuto", $article["ID_Articolo"], $templateParams["shipMethod"]["ID_Tipo_Sped"], $templateParams["randomIDOrder"]);
                }
                $i++;
            }
            $templateParams["newBal"] = min_precision($templateParams["balance"]["Saldo"] - (float)getTotalWithShip($templateParams["articles"], $templateParams["shipMethod"]["Tariffa"], $templateParams["quantities"]), 2);
            $dbh->removeSald($_SESSION["username"],  round($templateParams["newBal"], 2));
            foreach ($templateParams["articles"] as $article) {    
                $dbh->deleteAllFromCart($_SESSION["username"], $article["ID_Articolo"]);
            }
            unset($_SESSION["quantities"]);
            header("Location: orderHistory.php?profile=1&id=".$templateParams["randomIDOrder"]);
        }

    }
    
    $templateParams["style"] = array("./css/productStyle.css", "./css/framework.css", "./css/cartStyle.css",
                                    "./css/buttons.css", "./css/modal.css", "./css/profile.css", "./css/accordion.css",
                                    "./css/completeOrderStyle.css",  "./css/searchResults.css",  "./css/ordineHistory.css");
    $templateParams["js"] = array("./js/plusMinusButton.js", "./js/accordion.js", "./js/modal.js", "./js/shipmentPrices.js");
} else {
    $_SESSION["completeOrder"] = "completeOrder";
    header("Location: login.php");
}

require 'template/base.php';
?>