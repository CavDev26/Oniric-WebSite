<?php
require_once 'bootstrap.php';

//Base Template


$templateParams["nome"] = "articolo-home.php";
$templateParams["articolo"] = $dbh->getArticle($_GET["id"]);
if (count($templateParams["articolo"]) == 0) {
    $templateParams["errorearticolo"] = "Ops! Non esiste nessun articolo simile!";
} else {
    $templateParams["articolo"] = $templateParams["articolo"][0];
    $templateParams["recensioni"] = $dbh->getReviewsOfArticle($_GET["id"]);
    $templateParams["votomedio"] = $templateParams["articolo"]["Voto_medio"];
    $templateParams["titolo"] = "Oniric - ".$templateParams["articolo"]["Nome"];
    $templateParams["dettagli"] = $dbh->getArticleDetails($_GET["id"]);
}
require 'template/base.php';
?>