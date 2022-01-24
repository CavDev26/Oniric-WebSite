<?php
require_once 'bootstrap.php';

$templateParams["titolo"] = "Oniric";
$templateParams["nome"] = "home.php";

$templateParams["first-article"] = "";
$templateParams["articolo"] = $dbh->getArticle($templateParams["first-article"]);

$templateParams["style"] = array("./css/framework.css", "./css/buttons.css", "./css/indexStyle.css");

require 'template/base.php';
?>