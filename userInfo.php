<?php
require_once 'bootstrap.php';

//Base Template

$templateParams["titolo"] = "Gestisci i tuoi dati";
$templateParams["nome"] = "modifyUserInfo.php";
$templateParams["js"] = array("./js/togglePassword.js");
$templateParams["style"] = array("./css/login_signup.css", "https://fonts.googleapis.com/icon?family=Material+Icons");

if (isUserLoggedIn()) {
    if(isset($_POST["exit"])) {
        header("Location: login.php");
    }
    if (!isset($_POST["profile"])) {
        if (isset($_POST["nameAndsurname"]) && !empty($_POST["nameAndsurname"])) {
            if (isset($_POST["newpassword"]) && !empty($_POST["newpassword"])) {
                if (isset($_POST["confirmpassword"])&& !empty($_POST["confirmpassword"])) {
                    if ($_POST["confirmpassword"] == $_POST["newpassword"]) {
                        $dbh->updateUser($_SESSION["username"],$_POST["newpassword"], $_POST["nameAndsurname"]);
                        $_SESSION["passlen"] = strlen($_POST["newpassword"]);
                        $_SESSION["namesurname"] = $_POST["nameAndsurname"];
                        header("Location: login.php");
                    }
                    else {
                        $templateParams["errore"] = "Errore! Le nuove password non corrispondono";
                    }
                } else {
                    $templateParams["errore"] = "Errore! Per favore conferma la nuova password";
                }
            } else {
                $dbh->updateUserNames($_SESSION["username"],$_POST["nameAndsurname"]);
                $_SESSION["namesurname"] = $_POST["nameAndsurname"];
                header("Location: login.php");
            }  
        }else {
                $templateParams["errore"] = "Errore! Inserire un nome e cognome";
        }
    }
    $templateParams["userinfo"] = array("username" => $_SESSION["username"], "namesurname" => $_SESSION["namesurname"], 
                                        "birthdate" => $_SESSION["birthdate"], "passlen" => $_SESSION["passlen"]);
// $templateParams["categorie"] = $dbh->getCategories();
// $templateParams["articolicasuali"] = $dbh->getRandomPosts(2);
// //Home Template
// $templateParams["articoli"] = $dbh->getPosts();
}
require 'template/base.php';
?>