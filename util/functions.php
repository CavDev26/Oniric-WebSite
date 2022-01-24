<?php
function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
}

function getIdFromName($name){
    return preg_replace("/[^a-z]/", '', strtolower($name));
}

function isUserLoggedIn(){
    return !empty($_SESSION['username']);
}

function registerLoggedUser($user, $passlen){
    $_SESSION["username"] = $user["Nome_Utente"];
    $_SESSION["birthdate"] = $user["Data_Nascita"];
    $_SESSION["passlen"] = $passlen;
    $_SESSION["namesurname"] = $user["Nome"] . " " . $user["Cognome"];
}
function findBalance($payMethods) {
    foreach($payMethods as $payMethod) {
        if ($payMethod["Nome"] == "saldo") {
            return $payMethod;
        }
    }
}
function getAction($action){
    $result = "";
    switch($action){
        case 1:
            $result = "Inserisci";
            break;
        case 2:
            $result = "Modifica";
            break;
        case 3:
            $result = "Cancella";
            break;
    }

    return $result;
}


function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = $path.$imageName;
    
    $maxKB = 500;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 500KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists($path.$imageName));
        $fullPath = $path.$imageName;
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(strlen($msg)==0){
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}

function getMeanVote($reviews) {
    if (count($reviews) == 0) { return 0;}
    $mean = 0.0;
    $n = count($reviews);
    for ($i = 0; $i < $n; $i++) {
        $mean += (float) $reviews[$i]["Voto"];
    }
    return $mean / $n;
}
function userWroteReview($username, $reviews) {
    foreach ($reviews as $review) {
        if ($review["Nome_Utente"] == $username) {
            return true;
        }
    }
    return false;
}

function getTotalPrices($articles, $q) {
    $price = 0.0;
    $sum = 0.0;
    $i = 0;
    foreach($articles as $art) {
        $price = (float)($art["Costo_listino"] - round((float)$art["Sconto"]*(float)$art["Costo_listino"], 2))*$q[$i];
        $sum += (float)$price;
        $i++;
    }
    return round($sum, 2);
}
function getTotalWithShip($articles, $ship, $q){
    $sum = getTotalPrices($articles, $q);
    $sum += (float) $ship;
    return $sum;
}
function min_precision($x, $p) {
    $e = pow(10,$p);
    return floor($x*$e)==$x*$e?sprintf("%.${p}f",$x):$x;
}
function calculateMinRecharge($saldo, $spesa) {
    $necessario = 0.00;
    if( $saldo >= $spesa){
        $necessario = 0.00;
    }else {
        $necessario = $spesa - $saldo;
    }
    return $necessario;
}
function generateNotificationId($letter, $objectId) {
    return "N" . $letter . $objectId ."&". date("ymds") . rand(0, 128);
}
function getHrefOfNotification ($notificationId) {
    $letter = substr($notificationId, 1, 1);
    if ($letter == "C") {
        return "cart.php";
    } else if ($letter == "O") {
        $orderId = substr($notificationId, 3, strrpos($notificationId, "&")-3);
        return "order.php?id=". $orderId;
    }
    return "";
}

function generateRandomOrderID($length = 10, $orderIDS) {
    // return "abcd2";

    $randomString = '';
    $bene = true;
    while(strlen($randomString)  < $length) {
        $randomString = '';
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        // echo $randomString;
        return $randomString;
        // foreach ($orderIDS as $id) {
        //     if ($id == $randomString) {
        //         $bene = false;
        //         break;
        //     } else {
        //         $bene = true;
        //     }
        // }
        // if ($bene == true) {
        //     return $randomString;
        // }
    }
}

function generateRandomSpedID($length = 10) {
    // return "sped1";
    $randomString = '';
    $bene = true;
    while(strlen($randomString)  < $length) {
        $randomString = '';
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        // echo $randomString;
        return $randomString;
    }
}

?>