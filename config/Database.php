<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    class Database {
        //DB Parameters
        private $host = 'localhost';
        private $db_name = 'aicsians_db';
        private $db_user = 'root';
        private $db_pass = '';
        private $conn;

        
        //DB Connect 
        public function connect(){
            

            if(!isset($this->conn)){
                try{
                    $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->db_user, $this->db_pass,
                    array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8"
                    ));
                    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }catch(PDOException $e){
                    echo "Connection Error: " . $e->getMessage(); 
                    die();
                }
            }
            if(!$this->conn){
                function __destruct(){
                    $this->conn = null;
                }
            }else{
                return $this->conn;
            }
            
            
        }
    }