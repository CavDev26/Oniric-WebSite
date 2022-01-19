<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        
    }
    public function getRandomPosts($n){
        $stmt = $this->db->prepare("SELECT idarticolo, titoloarticolo, imgarticolo FROM articolo ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function insertArticle($titoloarticolo, $testoarticolo, $anteprimaarticolo, $dataarticolo, $imgarticolo, $autore){
        $query = "INSERT INTO articolo (titoloarticolo, testoarticolo, anteprimaarticolo, dataarticolo, imgarticolo, autore) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssssi',$titoloarticolo, $testoarticolo, $anteprimaarticolo, $dataarticolo, $imgarticolo, $autore);
        $stmt->execute();
        return $stmt->insert_id;
    }
    public function deleteCategoryOfArticle($articolo, $categoria){
        $query = "DELETE FROM articolo_ha_categoria WHERE articolo = ? AND categoria = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$articolo, $categoria);
        return $stmt->execute();
    }

    public function checkLogin($username, $password){
        $query = "SELECT Nome, Cognome, Nome_Utente, Data_Nascita FROM utente WHERE Nome_Utente = ? AND Password_Utente = ?";
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
    public function registerUser($name, $surname, $username, $password, $birthdate) {
        $query = "INSERT INTO utente (Nome, Cognome, Nome_Utente, Password_Utente, Data_Nascita) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssss',$name, $surname, $username, $password, $birthdate);
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
        $query = "SELECT Nome, Descrizione, Descrizione_breve, Costo_listino, Quantita_Disp, Sconto, Cartella_immagini, App_Nome FROM articolo WHERE articolo.ID_Articolo = ? LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$articleId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getReviewsOfArticle($articleId) {
        $query = "SELECT Nome_Utente, Voto, Testo, Titolo, Data_Recensione FROM recensione WHERE ID_Articolo = ? LIMIT 10";
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
}
?>