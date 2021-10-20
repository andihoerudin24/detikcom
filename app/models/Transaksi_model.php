<?php

class Transaksi_model {

    private $dbh;
    private $stmt;
    protected $tables = 'transaction';

    public function __construct() 
    {
         $dsn = 'mysql:host=localhost;dbname=detikcom';
         try {
             $this->dbh = new PDO($dsn,'root','');
         } catch (PDOException $e) {
            die($e->getMessage());
         }    
    }

    public function getTransaction() {

        $this->stmt = $this->dbh->prepare("SELECT * FROM $this->tables");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}