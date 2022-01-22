<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Complete Order";
$templateParams["nome"] = "completeOrderForm.php";

$templateParams["articles"] = array($dbh->getArticlesInCart($_SESSION["username"]));
$templateParams["articles"] = $templateParams["articles"][0];

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

$templateParams["paymentMethods"] = $dbh ->getPayMethods($_SESSION["username"], );

$templateParams["randomID"] =  generateRandomOrderID();

if(isset($_POST["totale"])) {
    $dbh->addOder($templateParams["randomID"], $_POST["chosenadd"], $_POST["totale"], $_SESSION["username"]);
    // header("Location:" ); direi che va in ordine history
}


$templateParams["style"] = array("./css/productStyle.css", "./css/framework.css", "./css/cartStyle.css",
                                 "./css/buttons.css", "./css/modal.css", "./css/profile.css", "./css/accordion.css",
                                 "./css/completeOrderStyle.css",  "./css/searchResults.css",  "./css/ordineHistory.css");
$templateParams["js"] = array("./js/plusMinusButton.js", "./js/accordion.js", "./js/modal.js", "./js/shipmentPrices.js");

require 'template/base.php';
?>