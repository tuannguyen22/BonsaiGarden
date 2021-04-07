<?php

require 'config.php';
$config;

class Database{   
        private $host;
        private $user;
        private $pass;
        private $dbname;
        private $charset;
        public $connection;
        private $result;
        private $show_errors = TRUE;
        public $query_count = 0;
    

        public function __construct(  ) {
            global $config;
            $this->host=$config['DB']['host'];
            $this->user=$config['DB']['user'];
            $this->pass=$config['DB']['pass'];
            $this->dbname=$config['DB']['schema'];
            $this->charset=$config['DB']['charset'];
            $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->dbname); 
            $this->connection->set_charset($this->charset);      
            if ($this->connection->connect_error) { 
                $this->error('Failed to connect to MySQL - ' . $this->connection->connect_error);
            }
        }
        public function getDBName(){ return $this->dbname;}
        public function setDBName($dbname ){$this->dbname=$dbname;}
    
      
        public function query($query) {
     
            try{
               $this->result= $this->connection->query($query);
            }
          
             catch(Throwable $e) {
                $this->error('Unable to prepare MySQL statement (check your syntax) - ' . $e);
            }
          
            return $this->result;
        }
    
        public function fetchAll() {
           
            $result = array();
            while ($row= $this->fetchArray()) {
                    $result[] = $row;
                }       
            return $result;
        }
    
        public function fetchArray() {         
            $result =$this->result->fetch_assoc();            
            return $result;
        }
    
        public function close() {
            return $this->connection->close();
        }
    
        // public function numRows() {
        //     $this->query->store_result();
        //     return $this->query->num_rows;
        // }
    
        // public function affectedRows() {
        //     return $this->query->affected_rows;
        // }
    
        // public function lastInsertID() {
        //     return $this->connection->insert_id;
        // }
    
        public function error($error) {
            if ($this->show_errors) {
                exit($error);
            }
        }
    
        private function _gettype($var) {
            if (is_string($var)) return 's';
            if (is_float($var)) return 'd';
            if (is_int($var)) return 'i';
            return 'b';
        }
    
    

}



?>