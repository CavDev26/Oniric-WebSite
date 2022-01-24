<?php
require_once 'bootstrap.php';
if(isUserLoggedIn()){

    if (isset($_GET["id"])){
        $templateParams["id"] = $_GET["id"];
        $templateParams["titolo"] = "Recensioni - Articolo ".$templateParams["id"];
        $templateParams["nome"] = "reviewsTemplate.php";
        if(count($dbh->getArticle($templateParams["id"])) == 0) {
            $templateParams["noarticolo"] = "Non c'è un articolo con questo id...";
            $templateParams["backlink"] = "index.php";
        } else {
            $templateParams["reviews"] = array($dbh->getUserReviews($templateParams["id"], true));
            $templateParams["reviews"] = $templateParams["reviews"][0];
            if(count($templateParams["reviews"]) == 0){
                $templateParams["norecensioni"] = "Non ci sono ancora recensioni!";
            }
            $templateParams["backlink"] = "articolo.php?id=".$templateParams["id"];
        }
    } else {
        $templateParams["titolo"] = "Le tue recensioni";
        $templateParams["nome"] = "reviewsTemplate.php";

        $templateParams["reviews"] = array($dbh->getUserReviews($_SESSION["username"], false));
        $templateParams["reviews"] = $templateParams["reviews"][0];
        if(count($templateParams["reviews"]) == 0){
            $templateParams["norecensioni"] = "Non hai ancora lasciato recensioni!";
        }
        $templateParams["backlink"] = "login.php";
    }

    $templateParams["style"] = array("./css/framework.css", "./css/cartStyle.css",
    "./css/buttons.css", "./css/modal.css", "./css/profile.css", "./css/accordion.css",
    "./css/productStyle.css",  "./css/reviewsStyle.css");
    $templateParams["js"] = array("./js/accordion.js", "./js/modal.js");
}
require 'template/base.php';
?>