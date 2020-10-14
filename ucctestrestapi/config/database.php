<?php 
    /**
     * Database Class
     * @return database connection
     */
    class Database {
        // Private Variables
        private $host = "";	// Set Database Host
        private $database_name = ""; // Set Database Name
        private $username = ""; // Set Database Username
        private $password = ""; // Set Database Password
        
        // Public Variables
        public $conn;

        /**
         * Get Connection function
         */
        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  
?>