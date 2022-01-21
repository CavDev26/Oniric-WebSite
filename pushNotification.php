<?php
include "util/functions.php";
require "bootstrap.php";
if(isUserLoggedIn()) {
        if(isset($_GET["articleId"])) {
            if (isset($_GET["cartAddition"])) {
                $notification = array("ID_Notifica" => $_GET["articleId"]+(string)rand(0,2048), "Titolo" => $_GET["cartAddition"], "Descrizione" =>"Hai aggiunto questo articolo al carrello", "Data_Ora" => date("Y-m-d H:i:s"), "Letto" => false, "ID_Ordine" => null, "Nome_Utente" => $_SESSION["username"]);
                if (isset($_GET["imgpath"])) {
                    $notification["Immagine"] = $_GET["imgPath"]; 
                }
                $dbh->pushNotification($notification);
                echo '<a href="">  
            <li class="notification-dimensions">
                <div class="notification-elem">
                <img src="'. $notification["Immagine"].'" alt="" class="notification-img-product"/>
                <h1 class="notification-type left-text">'.$notification["Titolo"].'</h1>
                <p class="notification-status left-text">'.$notification["Descrizione"].'</p>
                <img src="./img/notifica-ball.png" alt="" class="notification-indicator"/>
                <footer class="notification-time right-text">'.$notification["Data_Ora"].'</footer></div></li></a><hr class="span-notifications-div">';
            }
        }
    }


?>