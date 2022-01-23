<?php
require_once 'bootstrap.php';

//Base Template
unset($_SESSION["article"]);

if (!isset($_GET["pagenum"])) {
    $_GET["pagenum"] = 1;
}
$filters = array();
$filters["tag"] = array();
$filters["price"] = array();
$filters["category"] = array();
$filters["vote"] = array();

if (isset($_GET["tag"])) {
    foreach ($_GET["tag"] as $tag) {
        array_push($filters["tag"], $tag) ;
    }
}
if (isset($_GET["price"])) {
    foreach ($_GET["price"] as $price) {
        array_push($filters["price"], $price) ;
    }
}
if (isset($_GET["category"])) {
    foreach ($_GET["category"] as $category) {
        array_push($filters["category"], $category) ;
    }
}
if (isset($_GET["vote"])) {
    foreach ($_GET["vote"] as $vote) {
        array_push($filters["vote"], $vote) ;
    }
}

$templateParams["titolo"] = "Oniric - Articoli";
$templateParams["nome"] = "articleListPage.php";
$templateParams["articoli"] = $dbh->getArticles($_GET["pagenum"], $filters);
$templateParams["style"] = array("./css/searchResults.css", "./css/accordion.css", "./css/modal.css"); 
$templateParams["js"] = array("./js/accordion.js", "./js/modal.js", "./js/addToCart.js");
$templateParams["pageNumber"] = (int) $dbh->getNumberOfArticles()[0]["COUNT(*)"]/ 4;
$templateParams["tags"] = $dbh->getTags();
$templateParams["categorie"] = $dbh->getCategories();
$filters = array();

if (count($templateParams["articoli"]) == 0) {
    $templateParams["errorearticolo"] = "Non ho trovato articoli!";
} 
require 'template/base.php';
?>