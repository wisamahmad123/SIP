<?php
class Database {
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "pblweb_revisi";
    public $conn;

    public function __construct() {
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>