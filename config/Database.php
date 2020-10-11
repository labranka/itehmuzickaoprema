<?php
class Database {
    //DB Parametri
    private $host= 'localhost';
    private $db_name = 'muzickaoprema';
    private $username="root";
    private $password="";
    private $conn;

    //Konekcija
    public function connect() {
        $this->conn = null;

        try{
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOExeption $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
 }
