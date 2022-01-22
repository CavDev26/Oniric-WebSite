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
        $query = "SELECT Nome, Cognome, Nome_Utente, Data_Nascita FROM utente WHERE Nome_Utente = ? AND Password = ?";
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
        $query = "SELECT Nome, Data_Arrivo, Cartella_immagini FROM articolo a, dettaglio_spedizione d, ordine o WHERE o.Nome_Utente = ? AND
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
        $query = "SELECT ID_Articolo, Nome_Utente, Voto, Testo, Titolo, Data_Recensione FROM recensione WHERE ID_Articolo = ? LIMIT 10";
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
        $query = "SELECT Email, Cognome FROM utente WHERE(Nome_Utente = ?)";
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
        $query = "SELECT ID_Notifica, Titolo, Descrizione, Data_Ora, Letto, ID_Ordine, Nome_Utente FROM notifica WHERE Nome_Utente = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function pushNotification($notification) {
        $query = "INSERT INTO notifica(ID_Notifica, Titolo,Descrizione, Data_Ora, Letto, ID_Ordine, Nome_Utente, Immagine) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssssss',$notification["ID_Notifica"], $notification["Titolo"], $notification["Descrizione"], $notification["Data_Ora"], $notification["Letto"], $notification["ID_Ordine"], $notification["Nome_Utente"], $notification["Immagine"]);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function updateSald($username, $importo) {
        // echo "Sto a fare dio merda";
        $query = "UPDATE utente SET saldo = (? + Saldo) WHERE Nome_Utente = ?";
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
    public function addOrder($ID_Ordine, $Indirizzo, $spesa, $username){
        $query = "INSERT INTO ordine (ID_Ordine, Indirizzo_Consegna, Data_Acquisto, Spesa_Totale, Nome_Utente) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $data = date("Y-m-d");
        $stmt->bind_param('sssds', $ID_Ordine, $Indirizzo, $data, $spesa, $username);
        $stmt->execute();
        return $stmt->insert_id;
    }
}
?>