<?php

class UserRepository {
    private $conn;

    public function __construct() {
        $servername = "your_server_name";
        $username = "your_username";
        $password = "your_password";
        $dbname = "your_database_name";

        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getAllUsers() {
        $users = array();

        $result = $this->conn->query("SELECT * FROM users");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }

        return $users;
    }

    // Add other methods as needed

    public function __destruct() {
        // Close the database connection when the object is destroyed
        $this->conn->close();
    }
}
?>