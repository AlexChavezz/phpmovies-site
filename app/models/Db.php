<?php 
    class Db
    {
        protected $host='localhost';
        protected $dbname='PELICULAS';
        protected $username='alexis';
        protected $password='';

        public function connect()
        {
            try {
                $db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
                return $db;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>