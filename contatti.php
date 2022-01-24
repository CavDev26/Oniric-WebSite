<?php
require_once 'bootstrap.php';
$templateParams["titolo"] = "Contatti";
$templateParams["nome"] = "contattiTemplate.php";


$templateParams["style"] = array("./css/framework.css", "./css/modal.css", "./css/profile.css", "./css/accordion.css", "./css/contacts.css");
$templateParams["js"] = array("./js/modal.js");
require 'template/base.php';
?>