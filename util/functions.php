<?php
function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
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
function getTotalWithShipNoQ($articles, $ship){
    $q = array();
    for ($i = 0; $i < count($articles); $i++) {
        array_push($q, 1);
    }
    $sum = getTotalPrices($articles, $q);
    $sum += (float) $ship;
    return $sum;
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
    return "N" . $letter . $objectId ."x". date("ymds") . rand(0, 128);
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

function generateRandomOrderID($length = 10) {
    $randomString = '';
    $bene = true;
    while(strlen($randomString)  < $length) {
        $randomString = '';
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

function generateRandomSpedID($length = 10) {
    $randomString = '';
    $bene = true;
    while(strlen($randomString)  < $length) {
        $randomString = '';
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
function findExtension ($dir, $i) {
    $extensions = array("jpg", "png");
    foreach ($extensions as $extension) {
        if (file_exists($dir . "/" . $i .".". $extension ))
        {
            return $dir . "/" . $i . ".". $extension;
        }
    }
    return "";
}
function filterQuery ($filters) {
    $query = " ";
    $flag = 0;
    if (!empty($filters["tag"])) {
        $query .= "(EXISTS (SELECT ID_Articolo, Nome FROM richiamo r WHERE a.ID_Articolo = r.ID_Articolo AND r.Nome IN (";
        foreach ($filters["tag"] as $tag) {
            $query .= "\"".$tag."\",";
        }
        $query = rtrim($query, ", ");
        $query .= ")))";
        $flag = 1;
    }
    if (!empty($filters["price"])) {
        if ($flag == 1) {
            $query .= " AND";
        }
        $query .= " ( ";
        foreach ($filters["price"] as $price) {
            $query .= " a.Costo_listino - a.Costo_listino * a.Sconto " . generateQuery("price", $price) . " OR";
        }
        $query = rtrim($query, "OR ");
        $query .= ") ";
        $flag = 1;
    }
    if (!empty($filters["vote"])) {
        if ($flag == 1) {
            $query .= " AND";
        }
        $query .= " ( ";
        foreach ($filters["vote"] as $vote) {
            $query .= " Voto_medio " . generateQuery("vote", $vote) . " OR";
        }
        $query = rtrim($query, "OR ");
        $query .= ") ";
        $flag = 1;
    }
    if (!empty($filters["category"])) {
        if ($flag == 1) {
            $query .= " AND ";
        }
        $query .= " ( ";
        $query .= " App_Nome IN ( ";
        foreach ($filters["category"] as $category) {
            $query .= "\"".$category."\",";
        }
        $query = rtrim($query, ", ");
        $query .= "))";
        $flag = 1;
    }
    if (!empty($filters["name"])) {
        if ($flag == 1) {
            $query .= " AND ";
        }
        $query .= " a.Nome LIKE '%{$filters["name"]}%'";
    }
    return $query;
}
function generateQuery ($field, $value) {
    if ($field == "price") {
        if ($value == 1) {
            return " BETWEEN 100 AND 500 ";
        } else if ($value == 2) {
            return "BETWEEN 500 AND 1000";
        } else if ($value == 3) {
            return "> 1000";
        }
    } else if ($field == "vote") {
        if ($value == 1) {
            return " = 5 ";
        } else if ($value == 2) {
            return " >= 4";
        } else if ($value == 3) {
            return ">= 3 ";
        } else if ($value == 4) {
            return ">= 2 ";
        }else if ($value == 5) {
            return ">= 1 ";
        }
    }
}
function createInput($name, $value) {
    return "<input type=\"hidden\" name=\"".$name."\" value=\"".$value."\"/>";
}

function keepGetValues() {
    if (isset($_GET["tag"])) {
        if (is_array($_GET["tag"] )) {
            foreach ($_GET["tag"] as $tag) {
                echo createInput("tag[]", $tag);
            }   
        } else {
            echo createInput("tag[]", $_GET["tag"]);
        }
    }
    if (isset($_GET["price"])) {
        if (is_array($_GET["price"] )) {
            foreach ($_GET["price"] as $price) {
                echo createInput("price[]", $price);
            }   
        } else {
            echo createInput("price[]", $_GET["price"]);
        }
    }
    if (isset($_GET["vote"])) {
        if (is_array($_GET["vote"] )) {
            foreach ($_GET["vote"] as $vote) {
                echo createInput("vote[]", $vote);
            }   
        } else {
            echo createInput("vote[]", $_GET["vote"]);
        }
    }
    if (isset($_GET["category"])) {
        if (is_array($_GET["category"] )) {
            foreach ($_GET["category"] as $category) {
                echo createInput("category[]", $category);
            }   
        } else {
            echo createInput("category[]", $_GET["category"]);
        }
    }
    if (isset($_GET["name"])) {
        echo createInput("name", $_GET["name"]);
    }
    if (isset($_GET["sort"])) {
        echo createInput("sort", $_GET["sort"]);
    }
}

function checkForChecked($getVar, $value) {
    if (isset($getVar)) {
        if (is_array($getVar)) {
            foreach ($getVar as $var) {
                if ($var == $value) {
                    return true;
                }
            }
        } else {
            if ($value == $getVar) {
                return true;
            }
        }
        
    }
    return false;
}
?>