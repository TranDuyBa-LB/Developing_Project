<?php

        class database{
                private $_error; //Lưu trữ lỗi xảy ra.

                private $_object_db;
                //Thông số cấu hình cho database

                private $_db_name = 'myblog';
                private $_host = 'localhost';
                private $_name_admin = 'myblog';
                private $_pass_admin = 'Ba123456789';

                //Kết nối database
                function connect_db(){
                    try {
                        $this->_object_db = new PDO("mysql:host=$this->_host;dbname=$this->_db_name",$this->_name_admin,$this->_pass_admin);
                    } catch (PDOException $error) {
                        $error = $error->getMessage();
                        $this->_error = $error;
                    }
                }

                //Ngắt kế nối database
                function disconnect_db(){
                    if(empty($this->_object_db))
                        return false;
                    else{
                        $this->__object_db = NULL;
                    }
                }

                //Các hàm query cơ bản
                function SELECT($_column,$_table,$_where){
                    $_select = " SELECT $_column
                                FROM $_table
                                WHERE $_where ";
                    return $_select;
                }
                function INSERT ($_column,$_table,$_values) {
                    $_insert = " INSERT INTO $_table($_column)
                                VALUES ($_values) ";
                    return $_insert;
                }
                function DELETE($_table,$_where){
                    $_delete = " DELETE FROM $_table WHERE $_where";
                    return $_delete;
                }
                function UPDATE($_table,$_set,$_where) {
                    $_update = " UPDATE $_table
                                SET $_set
                                WHERE $_where ";
                    return $_update;
                }

                //Thực thi query
                function execute_query($_query){
                    $this->connect_db();
                    if(!empty($this->_error))
                        return false;
                    else {
                        try {
                            $_obj_statement= $this->_object_db->prepare($_query);
                            $_obj_statement->execute();
                            $this->disconnect_db();
                            return $_obj_statement;
                        } catch(Exception $error){
                            $this->_error = $error;
                            $this->disconnect_db();
                            return false;
                        }
                    }
                }

                //Xuất lỗi
                function error(){
                    if(empty($this->_error))
                        return false;
                    else 
                        return $this->_error;;
                }

        }
 
 ?>