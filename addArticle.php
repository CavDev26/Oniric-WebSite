<?php
require_once 'bootstrap.php';

unset($_SESSION["article"]);

if(isUserLoggedIn()){
    $templateParams["titolo"] = "Aggiungi un articolo";
    $templateParams["nome"] = "addArticleTemplate.php";
    if(!$dbh->isAdmin($_SESSION["username"])){
        $templateParams["noadmin"] = "Non hai i permessi per accedere a questa pagina";
    } else {
        if(isset($_POST["name"]) && isset($_POST["app_nome"]) && isset($_POST["briefDesc"]) && isset($_POST["price"]) && isset($_POST["discount"]) && isset($_POST["descrizione"])) {//poi i dettagli articolo
            
            $templateParams["user"] = $_SESSION["username"];

            $templateParams["categories"] = array($dbh->getCategories());
            $check = false;
            foreach($templateParams["categories"] as $cat){
                if($_POST["app_nome"] == $cat){
                    $check = true;
                }
            }
            if($check == false) {
                $dbh->addCategory($_POST["app_nome"]);
            }
            $templateParams["app"] = $_POST["app_nome"];
            $templateParams["ID"] = generateNotificationId("A", generateRandomOrderID(5));

            mkdir(UPLOAD_DIR."/".$templateParams["ID"]."/");

            list($result, $msg) = uploadImage(UPLOAD_DIR."/".$templateParams["ID"]."/", $_FILES["imgarticolo"]);
            if($result != 0){
                $imgarticolo = $msg;
                $dbh->insertArticle($templateParams["ID"], 
                    $_POST["name"], 
                    $_POST["descrizione"], 
                    $_POST["briefDesc"], 
                    $_POST["price"], 
                    $_POST["qty"], 
                    (float)($_POST["discount"])/100,
                    $templateParams["ID"], 0, 
                    $templateParams["user"], 
                    $templateParams["app"]);
                if(isset($_POST["nomeDettaglio"]) && isset($_POST["valoreDettaglio"])){
                    $i = 0;
                    foreach ($_POST["nomeDettaglio"] as $n) {
                        if(!empty($_POST["valoreDettaglio"][$i])) {
                            $dbh->insertDettaglioArt($templateParams["ID"], $n, $_POST["valoreDettaglio"][$i]);
                        }
                        $i++;
                    }
                }
                rename(UPLOAD_DIR."/".$templateParams["ID"]."/".$imgarticolo, UPLOAD_DIR."/".$templateParams["ID"]."/"."1.png");
                header("Location: articolo.php?id=".$templateParams["ID"]);
            } else {
                $msg = "Errore in inserimento!";
            }
        }
    }
    $templateParams["style"] = array("./css/productStyle.css", "./css/carousel.css", "./css/login_signup.css", "./css/addArticleStyle.css"); 
    $templateParams["js"] = array("./js/carousel.js", "./js/slider.js", "./js/tableArticle.js");    
} else {
    header("Location: login.php");
}

require 'template/base.php';
?>