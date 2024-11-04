<?php
// Database configuration constants
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'railshub');

// Create database connection class
class Database {
    private $connection;

    // Initialize database connection
    public function __construct() {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            
            if ($this->connection->connect_error) {
                throw new Exception('Connection failed: ' . $this->connection->connect_error);
            }
            
            // Set charset to UTF8
            $this->connection->set_charset('utf8');
            
        } catch (Exception $e) {
            error_log('Database Connection Error: ' . $e->getMessage());
            die('Database connection failed. Please try again later.');
        }
    }

    // Get database connection
    public function getConnection() {
        return $this->connection;
    }

    // Close database connection
    public function closeConnection() {
        if ($this->connection) {
            $this->connection->close();
        }
    }

    // Execute query with error handling
    public function query($sql) {
        try {
            $result = $this->connection->query($sql);
            if (!$result) {
                throw new Exception('Query failed: ' . $this->connection->error);
            }
            return $result;
        } catch (Exception $e) {
            error_log('Query Error: ' . $e->getMessage());
            return false;
        }
    }

        // Add new method for prepared statements
        public function prepare($sql) {
            try {
                $stmt = $this->connection->prepare($sql);
                if (!$stmt) {
                    throw new Exception('Prepare failed: ' . $this->connection->error);
                }
                return $stmt;
            } catch (Exception $e) {
                error_log('Prepare Error: ' . $e->getMessage());
                return false;
            }
        }
        
        /**
         * Escapes special characters in a string for use in a SQL statement, taking into account the current charset of the connection.
         *
         * @param string $string The string to be escaped.
         *
         * @return string The escaped string.
         */

        public function escape_string($string) {
            return mysqli_real_escape_string($this->connection, $string);
        }
}
?>