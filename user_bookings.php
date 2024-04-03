<?php
include_once 'data.php';
include_once 'DatabaseConnection.php';

class UserRepository
{
    private $connection;
    private $table = 'hoteldata';

    function __construct()
    {
        $dbConnection = new DatabaseConnection();
        $this->connection = $dbConnection->startConnection();
    }

    function insertUser($user)
    {
        try {
            $conn = $this->connection;
    
            // Hardcoded values for testing
            $id = 123;
            $username = 'test_user';
            $hotel = 'test_hotel';
            $date = '2024-04-01';
    
            $sql = "INSERT INTO $this->table (id, user, hotel, date) VALUES (?, ?, ?, ?)";
            $statement = $conn->prepare($sql);
    
            $statement->execute([$id, $username, $hotel, $date]);
    
            echo "<script> alert('User has been inserted successfully!'); </script>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    

    function getAllUsers()
{
    try {
        $conn = $this->connection;

        $sql = "SELECT * FROM $this->table";

        $statement = $conn->query($sql);
        $users = $statement->fetchAll();

        return $users;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return []; // Return an empty array in case of an error
    }
}

    function getUserById($id)
    {
        $conn = $this->connection;
    
        $sql = "SELECT * FROM $this->table WHERE id=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$id]);
    
        // Fetch the user data from the executed statement
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    
        return $user;
    }

    function updateUser($id, $user, $hotel, $date)
    {
        $conn = $this->connection;

        $sql = "UPDATE $this->table SET user=?,  hotel=?,  date=? WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$user, $hotel, $date, $id]);

        echo "<script>alert('update was successful'); </script>";
    }

    function deleteUser($id)
    {
        $conn = $this->connection;

        $sql = "DELETE FROM $this->table WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);

        echo "<script>alert('delete was successful'); </script>";
    }
}


?>
