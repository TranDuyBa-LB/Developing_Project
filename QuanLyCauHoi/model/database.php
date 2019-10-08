<?php
    class database {
        private $host = 'localhost';              //---------->Tên host<------------//
        private $dbName = 'questions';           //---------->Tên database<--------//
        private $userName = 'question';         //---------->Tên user<------------//
        private $userPassword = 'Ba123456789'; //---------->Mật khẩu user<-------//

        private $objDatabase;

        public $error=[];

        /*-------------------------------------------
        --------------Kết nối DataBase---------------
        --------------------------------------------*/
        private function connectDB() {
            try {
                $this->objDatabase = new PDO("mysql:host=$this->host;dbname=$this->dbName",$this->userName,$this->userPassword);
            } catch(PDOException $error){
                $this->error['connect'] = $error->getMessage();
                $error = $error->getMessage();
                header("Location:../views/displayError.php?error=$error");
            }
        }

        public function disConnectDB() {
            if(!empty($this->objDatabase))
                $this->objDatabase = null;
            else 
                exit();
        }
        /*-------------------------------------------
        --------------Các câu lệnh Query cơ bản-------
        --------------------------------------------*/
        public function SELECT($column,$table,$where=1){
            $select = " SELECT $column
                        FROM $table
                        WHERE $where ";
            return $select;
        }
        public function INSERT ($column,$table,$values) {
            $insert = " INSERT INTO $table($column)
                        VALUES ($values) ";
            return $insert;
        }
        public function DELETE($table,$where){
            $delete = " DELETE FROM $table WHERE $where";
            return $delete;
        }
        public function UPDATE($table,$set,$where) {
            $update = " UPDATE $table
                        SET $set
                        WHERE $where ";
            return $update;
        }

        /*-------------------------------------------
        --------------Thực thi truy vấn---------------
        --------------------------------------------*/
        public function executeQuery($query) {
            try {
                $this->connectDB();
                $statement = $this->objDatabase->prepare($query);
                $execute = $statement->execute();
                $this->disConnectDB();
                if($execute==true){
                    return $statement;
                }
                else
                    header("Location:../views/displayError.php?error=Không thể thực thi truy vấn !");
            } catch(Exception $error){
                $this->error['query'] = $error;
            }
        }
    }
?>