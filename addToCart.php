<?php
include "util/functions.php";
require "bootstrap.php";
if(isset($_GET["cartId"])) {
    if(isUserLoggedIn()) {
        if ($dbh->addToCart($_SESSION["username"], $_GET["cartId"]) == -1) {
            echo "Hai gi&agrave; questo articolo nel carrello";
        } else {
            echo "&#10004;";
        }
    }
    
}
?>