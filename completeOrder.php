<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Complete Order";
$templateParams["nome"] = "completeOrderForm.php";

$templateParams["articles"] = array($dbh->getArticlesInCart($_SESSION["username"]));
$templateParams["articles"] = $templateParams["articles"][0];


$templateParams["style"] = array("./css/productStyle.css", "./css/framework.css", "./css/cartStyle.css",
                                 "./css/buttons.css", "./css/modal.css", "./css/profile.css", "./css/accordion.css",
                                 "./css/completeOrderStyle.css",  "./css/searchResults.css",  "./css/ordineHistory.css");
$templateParams["js"] = array("./js/plusMinusButton.js", "./js/accordion.js", "./js/modal.js");

require 'template/base.php';
?>