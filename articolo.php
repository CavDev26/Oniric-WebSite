<?php
require_once 'bootstrap.php';

//Base Template


$templateParams["nome"] = "articolo-home.php";
$templateParams["articolo"] = $dbh->getArticle($_GET["id"]);
$templateParams["recensioni"] = $dbh->getReviewsOfArticle($_GET["id"]);
$templateParams["votomedio"] = getMeanVote($templateParams["recensioni"]);
$templateParams["titolo"] = "Oniric - ".$templateParams["articolo"][0]["Nome"];
$templateParams["dettagli"] = $dbh->getArticleDetails($_GET["id"]);
// $templateParams["categorie"] = $dbh->getCategories();
// $templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
// //Home Template
// $templateParams["articoli"] = $dbh->getPosts();

require 'template/base.php';
?>