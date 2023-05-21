<?php 
    class Db
    {
        protected $host='localhost';
        protected $dbname='peliculas';
        protected $username='alexis';
        protected $password='';
        protected $db;
        public function open()
        {
            try {
                $db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
                return $db;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        public function close()
        {
            $db = null;
        }
    }
?>