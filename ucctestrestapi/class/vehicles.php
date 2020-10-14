<?php
    /**
     * Vehicle Class
     * Contains main functions (Get, Create)
     */
    class Vehicle{
        // Connection
        private $conn;

        // Table
        private $db_table = "vehicle";

        // Columns
        public $id;
        public $unique_id;
        public $name;
        public $engine_displacement;
        public $engine_power;
        public $price;
        public $location;
        public $datecreated;

        // Database Connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET All Data Vehicle
        public function getVehicles(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . "";
            $statement = $this->conn->prepare($sqlQuery);
            $statement->execute();
            return $statement;
        }
        
        // CREATE Data Vehicle
        public function createVehicle(){
            $sqlQuery = "
                INSERT INTO ". $this->db_table ."
                SET
                    unique_id = :unique_id, 
                    name = :name, 
                    engine_displacement = :engine_displacement, 
                    engine_power = :engine_power, 
                    price = :price,
                    location = :location";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // Bind data
            $stmt->bindParam(":unique_id", $this->unique_id);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":engine_displacement", $this->engine_displacement);
            $stmt->bindParam(":engine_power", $this->engine_power);
            $stmt->bindParam(":price", $this->price);
            $stmt->bindParam(":location", $this->location);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        
        /**
         * Check Input (sanitize) function
         */ 
        public function checkInput($input) {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }
        
        /**
         * Check Input (sanitize) Engine Displacement function
         */ 
        public function checkInputEngineDisplacement($input) {
            
        }
    }
?>

