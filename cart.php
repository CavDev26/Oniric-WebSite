<?php
require_once 'bootstrap.php';
unset($_SESSION["cart"]);

if(isUserLoggedIn()){
    $templateParams["titolo"] = "Cart";
    $templateParams["nome"] = "cart-home.php";

    $templateParams["articles"] = array($dbh->getArticlesInCart($_SESSION["username"]));
    $templateParams["articles"] = $templateParams["articles"][0];
    if( count($templateParams["articles"]) == 0) {
        $templateParams["nessunarticolo"] = "Non hai articoli nel carrello!";
    }
    

    $templateParams["style"] = array("./css/productStyle.css", "./css/framework.css", "./css/cartStyle.css");
    $templateParams["js"] = array("./js/plusMinusButton.js");
} else {
    $_SESSION["cart"] = "cart";
    header("Location: login.php");
}
require 'template/base.php';
?>