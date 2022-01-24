<?php
include "util/functions.php";
require "bootstrap.php";
if(isset($_GET["artId"])) {
    if(isUserLoggedIn()) {
        $dbh->removeFromCart($_SESSION["username"], $_GET["artId"]);
    }
}
?>