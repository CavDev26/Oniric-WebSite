<?php
require_once 'bootstrap.php';

//Base Template
unset($_SESSION["article"]);

$templateParams["titolo"] = "Oniric - Errore";
$templateParams["nome"] = "articolo-home.php";
$templateParams["articolo"] = $dbh->getArticle($_GET["id"]);
$templateParams["style"] = array("./css/productStyle.css", "./css/carousel.css"); 
$templateParams["js"] = array("./js/carousel.js", "./js/slider.js", "./js/addToCart.js");

if (count($templateParams["articolo"]) == 0) {
    $templateParams["errorearticolo"] = "Ops! Non esiste nessun articolo simile!";
} else {
    $templateParams["articolo"] = $templateParams["articolo"][0];
    if (isset($_POST["reviewTitle"]) && isset($_POST["reviewText"]) && isset($_POST["reviewVote"])) {
        $dbh->insertReview($_SESSION["username"],$templateParams["articolo"]["ID_Articolo"],$_POST["reviewTitle"], $_POST["reviewText"], $_POST["reviewVote"] );
        $templateParams["recensioni"] = $dbh->getReviewsOfArticle($_GET["id"]);
        $vote = $dbh->calculateVote($templateParams["articolo"]["ID_Articolo"], $templateParams["recensioni"]);
        $templateParams["articolo"]["Voto_medio"] = $vote;
    }
    if (!isset( $templateParams["recensioni"])) {
        $templateParams["recensioni"] = $dbh->getReviewsOfArticle($_GET["id"]);
    }
    $templateParams["votomedio"] = $templateParams["articolo"]["Voto_medio"];
    $templateParams["titolo"] = "Oniric - ".$templateParams["articolo"]["Nome"];
    $templateParams["dettagli"] = $dbh->getArticleDetails($_GET["id"]);
    
}
require 'template/base.php';
?>