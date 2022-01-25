<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        
    }
    public function checkLogin($username, $password){
        $query = "SELECT Nome, Cognome, Nome_Utente, Data_Nascita, Amministratore FROM utente WHERE Nome_Utente = ? AND Password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function checkUserExists($username){
        $query = "SELECT Nome_Utente FROM utente WHERE Nome_Utente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        return count($result->fetch_all(MYSQLI_ASSOC)) > 0;
    }         
    public function registerUser($email,$name, $surname, $username, $password, $birthdate) {
        $query = "INSERT INTO utente (Email, Saldo, Nome, Cognome, Nome_Utente, Password, Data_Nascita, Amministratore) VALUES (?, 0.0, ?, ?, ?, ?, ?, false)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssss',$email, $name, $surname, $username, $password, $birthdate);
        $stmt->execute();
        return $stmt->insert_id;
    }
    public function getOrders($username) {
        $query = "SELECT o.ID_Ordine, Nome, Data_Arrivo, Cartella_immagini FROM articolo a, dettaglio_spedizione d, ordine o WHERE o.Nome_Utente = ? AND
                 d.ID_Ordine = o.ID_Ordine AND d.ID_Articolo = a.ID_Articolo";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getAddresses($username) {
        $query = "SELECT Via, Numero_civico, Citta  FROM indirizzo i WHERE i.Nome_Utente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getPayMethods($username, $limit=20) {
        $query = "SELECT Nome_Utente, Nome, Numero, Circuito_pagamento, Tassa FROM metodo_pagamento m WHERE m.Nome_Utente = ? LIMIT ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si',$username, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function insertNewAddress($username, $address) {
        $query = "INSERT INTO indirizzo (Via, Numero_civico, Citta, Nome_Utente) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('siss',$address["Via"],$address["Numero_civico"], $address["Citta"], $username);
        $stmt->execute();
        return $stmt->insert_id;
    }
    public function deleteAddress($username,$address) {
        $query = "DELETE FROM indirizzo where Via = ? AND Numero_civico = ? AND Citta = ? AND Nome_Utente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('siss',$address["Via"],$address["Numero_civico"], $address["Citta"], $username);
        return  $stmt->execute();
    }
    public function insertNewPayMethod($username, $payMethod) {
        $query = "INSERT INTO metodo_pagamento (Nome_Utente, Nome, Numero, Circuito_pagamento, Tassa) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssd',$username,$payMethod["Nome"], $payMethod["Numero"], $payMethod["Circuito_pagamento"], $payMethod["Tassa"]);
        $stmt->execute();
        return $stmt->insert_id;
    }
    public function getArticle($articleId) {
        $query = "SELECT ID_Articolo, Nome, Descrizione, Descrizione_breve, Costo_listino, Quantita_Disp, Sconto, Cartella_immagini, Voto_medio, Nome_Utente, App_Nome FROM articolo WHERE articolo.ID_Articolo = ? LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$articleId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getReviewsOfArticle($articleId) {
        $query = "SELECT ID_Articolo, Nome_Utente, Voto, Testo, Titolo, Data_Recensione FROM recensione WHERE ID_Articolo = ? LIMIT 5";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$articleId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getArticleDetails($articleId) {
        $query = "SELECT Nome, Valore FROM dettaglio_articolo WHERE ID_Articolo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$articleId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getBalance($username) {
        $query = "SELECT Saldo FROM utente WHERE Nome_Utente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getArticlesInCart($username) {
        $query = "SELECT ID_Articolo, Nome, Descrizione, Descrizione_breve, Costo_listino, Quantita_Disp, Sconto, Cartella_immagini, Voto_medio, Nome_Utente, App_Nome FROM articolo WHERE articolo.ID_Articolo in (SELECT ID_Articolo FROM carrello WHERE Nome_Utente = ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getShipmentMethods() {
        $query = "SELECT ID_Tipo_Sped, Nome_Corriere, Tariffa, Paese_Provenienza FROM tipo_spedizione";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getNameSurname($username) {
        $query = "SELECT Nome, Cognome FROM utente WHERE(Nome_Utente = ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);    
    }

    public function insertReview ($username, $articleId, $reviewTitle, $reviewText, $reviewVote) {
        $query = "INSERT INTO recensione (Nome_Utente, ID_Articolo,Voto, Testo, Titolo, Data_recensione) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $data = date("Y-m-d");
        $stmt->bind_param('ssssss',$username, $articleId, $reviewVote, $reviewText, $reviewTitle, $data);
        $stmt->execute();
        return $stmt->insert_id;
    }
    public function calculateVote($articleid, $reviews) {
        $vote = getMeanVote($reviews);
        $query = "UPDATE articolo SET Voto_medio = ? WHERE ID_Articolo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$vote,$articleid);
        $stmt->execute();
        return $vote;
    }
    public function isInTheCart($username, $articleId) {
        $query = "SELECT * FROM carrello WHERE Nome_Utente = ? AND ID_Articolo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$username, $articleId);
        $stmt->execute();
        $result = $stmt->get_result();
        return !empty($result->fetch_all(MYSQLI_ASSOC));
    }
    public function addToCart($username, $articleId) {
        if (!$this->isInTheCart($username, $articleId)) {
            $query = "INSERT INTO carrello(Nome_Utente, ID_Articolo) VALUES (?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss',$username, $articleId);
            $stmt->execute();
            return $stmt->insert_id;
        }   
        else {
            return -1;
        }
    }
    public function getNotifications($username) {
        $query = "SELECT ID_Notifica, Titolo, Descrizione, Data_Ora, Letto, ID_Ordine, Nome_Utente, Immagine
                FROM notifica WHERE Nome_Utente = ? ORDER BY Data_Ora DESC LIMIT 20";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function pushNotification($notification) {
        $query = "INSERT INTO notifica(ID_Notifica, Titolo,Descrizione, Data_Ora, Letto, ID_Ordine, Nome_Utente, Immagine) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssdsss',$notification["ID_Notifica"], $notification["Titolo"], $notification["Descrizione"], $notification["Data_Ora"], $notification["Letto"], $notification["ID_Ordine"], $notification["Nome_Utente"], $notification["Immagine"]);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function updateSald($username, $importo) {
        $query = "UPDATE utente SET Saldo = (? + Saldo) WHERE Nome_Utente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ds',$importo, $username);
        $stmt->execute();
        return $stmt->insert_id;
    }
    public function removeSald($username, $importo) {
        $query = "UPDATE utente SET Saldo = ? WHERE Nome_Utente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ds',$importo, $username);
        $stmt->execute();
        return $stmt->insert_id;
    }
    public function getOrderIds() {
        $query = "SELECT ID_Ordine FROM ordine";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return !empty($result->fetch_all(MYSQLI_ASSOC));
    }
    public function addOrder($ID_Ordine, $Indirizzo, $spesa, $username) {
        $query = "INSERT INTO ordine (ID_Ordine, Indirizzo_Consegna, Data_Acquisto, Spesa_Totale, Nome_Utente) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $data = date("Y-m-d");
        $stmt->bind_param('sssds', $ID_Ordine, $Indirizzo, $data, $spesa, $username);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function addDettaglioSpedizione($ID_Spedizione, $Costo_Spedizione, $Indirizzo_Consegna, $Status_Ordine, $ID_Articolo, $ID_Tipo_Sped, $ID_Ordine) {
        $query = "INSERT INTO dettaglio_spedizione (ID_Spedizione, Costo_Spedizione, Data_Arrivo, Indirizzo_Consegna, Status_Ordine, ID_Articolo, ID_Tipo_Sped, ID_Ordine) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $data = "00000000";
        $stmt->bind_param('sdssssss', $ID_Spedizione, $Costo_Spedizione, $data, $Indirizzo_Consegna, $Status_Ordine, $ID_Articolo, $ID_Tipo_Sped, $ID_Ordine);
        $stmt->execute();
        return $stmt->insert_id;
    }
    public function getShipmentMethodsByID($id) {
        $query = "SELECT ID_Tipo_Sped, Nome_Corriere, Tariffa, Paese_Provenienza FROM tipo_spedizione WHERE(ID_Tipo_Sped = ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function readNotifications($username) {
        $query = "UPDATE notifica SET Letto = 1 WHERE Nome_Utente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        return $stmt->insert_id;
    }
    public function deleteMethod($username,$methodName) {
        $query = "DELETE FROM metodo_pagamento where Nome_Utente = ? and Nome = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $username, $methodName);
        return  $stmt->execute();
    }
    public function modifyMethod($username,$payMethod, $methodName) {
        $query = "UPDATE metodo_pagamento SET Nome = ?, Circuito_pagamento = ?, Numero = ? WHERE Nome_Utente = ? and Nome = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssss', $payMethod["Nome"], $payMethod["Circuito_pagamento"], $payMethod["Numero"], $username, $methodName);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function deleteAllFromCart($username, $ID) {
        $query = "DELETE FROM carrello where Nome_Utente = ? and ID_Articolo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $username, $ID);
        return  $stmt->execute();
    }
    public function getOrderByID($username, $ID) {
        $query = "SELECT ID_Ordine, Indirizzo_Consegna, Data_Acquisto, Spesa_Totale FROM ordine WHERE(Nome_Utente = ? AND ID_Ordine = ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $username, $ID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNumberOfArticles($filters) {
        $query = "SELECT COUNT(*) FROM articolo a ";
        if (!(empty($filters["tag"]) && empty($filters["price"]) && empty($filters["vote"]) && empty($filters["category"]) 
        && empty($filters["name"])) ) {
            $query .= "WHERE ". filterQuery($filters);
        }
        $stmt = $this->db->prepare($query);

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDettagliSpedizioneandArticoli($IDOrdine) {
        $query = "SELECT ID_Spedizione, Costo_Spedizione, Data_Arrivo, Status_Ordine, d.ID_Articolo, ID_Tipo_Sped, Nome, Costo_listino, Sconto, Cartella_Immagini, Voto_medio FROM dettaglio_spedizione d, articolo a WHERE ID_Ordine = ? AND d.ID_Articolo = a.ID_Articolo";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $IDOrdine);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getTIpoSpedizione($IDTipo) {
        $query = "SELECT Nome_Corriere FROM tipo_spedizione WHERE ID_Tipo_Sped = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $IDTipo);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getArticles($pageNum, $filters, $sort) {
        $from = ($pageNum -1)* 4;
        if (empty($filters["tag"]) && empty($filters["price"]) && empty($filters["vote"]) && empty($filters["category"])
            && empty($filters["name"])) {
            $query = "SELECT ID_Articolo, Nome, Descrizione, Descrizione_breve, Costo_listino, Quantita_Disp, Sconto, Cartella_immagini, 
            Voto_medio, Nome_Utente, App_Nome FROM articolo ";
            if (!empty($sort)) {
                $query .= " ORDER BY Costo_listino - Costo_listino * Sconto " . $sort;
            }
            $query .= " LIMIT ?, 4";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i',$from);
            $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $query = "SELECT ID_Articolo, Nome, Descrizione, Descrizione_breve, Costo_listino, Quantita_Disp, Sconto, Cartella_immagini, 
            Voto_medio, Nome_Utente, App_Nome FROM articolo a WHERE";
            $query .= filterQuery($filters);
            if (!empty($sort)) {
                $query .= " ORDER BY (Costo_listino - Costo_listino * Sconto) " . $sort;
            }
            $query .= " LIMIT ?, 4";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i',$from);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        
    } 
    public function getTags() {
        $query = "SELECT Nome FROM tag LIMIT 10";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllOrdersByUsername($username) {
        $query = "SELECT o.ID_Ordine, Status_Ordine, Nome, Cartella_immagini FROM ordine o, dettaglio_spedizione d, articolo a WHERE o.Nome_Utente = ? AND d.ID_Ordine = o.ID_Ordine AND d.ID_Articolo = a.ID_Articolo";
        // $query = "SELECT o.ID_Ordine, Status_Ordine, ID_Articolo FROM ordine o, dettaglio_spedizione d WHERE o.Nome_Utente = ? AND d.ID_Ordine = o.ID_Ordine";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategories() {
        $query = "SELECT Nome FROM categoria LIMIT 10";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserReviews($var, $art) {
        if($art == true) {
            $query = "SELECT r.ID_Articolo, r.Voto, r.Testo, r.Titolo, r.Data_recensione, r.Nome_Utente, a.Nome, a.Cartella_immagini FROM recensione r, articolo a WHERE a.ID_Articolo = ? AND a.ID_Articolo = r.ID_Articolo";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s', $var);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $query = "SELECT r.ID_Articolo, r.Voto, r.Testo, r.Titolo, r.Data_recensione, a.Nome, a.Cartella_immagini FROM recensione r, articolo a WHERE r.Nome_Utente = ? AND r.ID_Articolo = a.ID_Articolo";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s', $var);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
    public function removeFromCart($username, $id) {
        $query = "DELETE FROM carrello where Nome_Utente = ? and ID_Articolo = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $username, $id);
        return  $stmt->execute();
    }
    public function updateUser($username,$newpassword, $namesurname) {
        $query = "UPDATE utente SET Password = ?, Nome = ?, Cognome = ? WHERE Nome_Utente = ?";
        $stmt = $this->db->prepare($query);
        $ns = explode(" ", $namesurname);
        $stmt->bind_param('ssss', $newpassword, $ns[0], $ns[1], $username);
        $stmt->execute();
        return $stmt->insert_id;
    }
    public function updateUserNames($username, $namesurname) {
        $query = "UPDATE utente SET Nome = ?, Cognome = ? WHERE Nome_Utente = ?";
        $stmt = $this->db->prepare($query);
        $ns = explode(" ", $namesurname);
        $stmt->bind_param('sss', $ns[0], $ns[1], $username);
        $stmt->execute();
        return $stmt->insert_id;
    }
    public function makeAdmin($username) {
        $query = "UPDATE utente SET Amministratore = 1 WHERE Nome_Utente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        return $stmt->insert_id;
    }
    public function isAdmin ($username) {
        $query = "SELECT Nome_Utente FROM utente WHERE Nome_Utente = ? AND Amministratore = 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        return !empty($result->fetch_all(MYSQLI_ASSOC));
    }
}
?>