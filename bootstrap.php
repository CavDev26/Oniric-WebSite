<?php
session_start();
define("UPLOAD_DIR", "./upload/");
require_once("db/database.php");
require_once("util/functions.php");
$dbh = new DatabaseHelper("localhost", "root", "", "ecommerce", 3307);
?>