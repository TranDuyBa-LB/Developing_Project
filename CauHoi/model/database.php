<?php
    class database {
        private $host = 'localhost';
        private $dbName = 'questions';
        private $userName = 'questions';
        private $userPassword = 'Ba123456789';

        private $objDatabase;

        private $error=[];

        private function ConnectDB() {
            try {
                $this->objDatabase = PDO("mysql:host=$this->host;dbName=$this->dbName",$this->userName,$this->userPassword);
            } catch(PDOException $error){
                $this->error['connect'] = $error->getMessage(); 
            }
        }

        
    }
?>