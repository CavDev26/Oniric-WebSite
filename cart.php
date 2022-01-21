<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Cart";
$templateParams["nome"] = "cart-home.php";

$templateParams["articles"] = array($dbh->getArticlesInCart($_SESSION["username"]));
if( count($templateParams["articles"]) == 0) {
    $templateParams["nessunarticolo"] = "Non hai articoli nel carrello!";
}
$templateParams["articles"] = $templateParams["articles"][0];


$templateParams["style"] = array("./css/productStyle.css", "./css/framework.css", "./css/cartStyle.css");
$templateParams["js"] = array("./js/plusMinusButton.js");

require 'template/base.php';
?>