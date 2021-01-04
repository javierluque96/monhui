<?php
    // @author Javier Luque Rodríguez

    class Database
    {
        private $dbHost = "localhost";
        private $dbUser = "root";
        private $dbPass = "";
        private $dbName = "monhui";

        private $conn;
        private $st;
        private static $instance;

        private function __clone()
        {
        }
        private function __construct()
        {
            $this->connect() ;
        }
        
        /**
         * __destruct
         *
         * @return void
         */
        public function __destruct()
        {
            $this->close() ;
        }
        
        /**
         * getDatabase
         *
         * @return Database
         */
        public static function getDatabase():Database
        {
            if (self::$instance == null) {
                self::$instance = new Database();
            }

            return self::$instance;
        }
        
        /**
         * connect
         *
         * @return void
         */
        private function connect()
        {
            try {
                $this->conn = new PDO(
                    "mysql: host={$this->dbHost}; dbname={$this->dbName}",
                    $this->dbUser,
                    $this->dbPass
                ) ;
            } catch (Exception $e) {
                die("**ERROR: can't connect to database: $e") ;
            }
        }
        
        /**
         * Execute a prepared sql query
         *
         * @param  string $sql
         * @param  mixed $params
         * @return bool
         */
        public function prepare(string $sql, array $params=[]): bool
        {
            $this->st = $this->conn->prepare($sql);
            $done = $this->st->execute($params);
            return $done;
        }

                
        /**
         * getRow
         *
         * @param  mixed $class
         * @return void
         */
        public function getRow()
        {   
            $row = $this->st->fetch(PDO::FETCH_ASSOC);
            return $row;
        }

        public function getAllObjects($class = "stdClass")
        {
            $data = $this->st->fetchAll(PDO::FETCH_CLASS, $class);
            
            return $data;
        }

        public function getStatement() {
            return $this->st;
        }

        
        /**
         * Close db connection
         *
         * @return void
         */
        private function close():void
        {
            $this->conn = null;
        }
    }
