<?php
require_once 'bootstrap.php';

//Base Template

$templateParams["titolo"] = "Oniric";
$templateParams["nome"] = "home.php";
// $templateParams["categorie"] = $dbh->getCategories();
// $templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
// //Home Template
// $templateParams["articoli"] = $dbh->getPosts();

require 'template/base.php';
?>