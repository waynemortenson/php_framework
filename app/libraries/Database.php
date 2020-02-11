<?php

/*
 * PDO DB class
 * Connect to DB
 * Create prepared statements
 * Bind Values
 * Return rows and results
*/

class Database {
    private $host = DB_HOST;
    private $dbname = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        //set DSN
        $dsn = 'mysql:host=' .$this->host . ';dbname' .$this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        //create pdo instance
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }

    }
}