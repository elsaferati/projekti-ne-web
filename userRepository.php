<?php
include_once 'config2.php';
include_once 'DatabaseConnection.php';



class UserRepository
{
    private $connection;
    private $table = 'crudtable';

    function __construct()
    {
        $dbConnection = new DatabaseConnection();
        $this->connection = $dbConnection->startConnection();
    }


    function insertUser($user)
    {

        $conn = $this->connection;

        $id = $user->getId();
        $name = $user->getName();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $sql = "INSERT INTO $this->table (id,name,email,password) VALUES (?,?,?,?)";

        $statement = $conn->prepare($sql);

        $statement->execute([$id, $name, $email, $password]);

        echo "<script> alert('User has been inserted successfuly!'); </script>";

    }

    function getAllUsers()
    {
        $conn = $this->connection;

        $sql = "SELECT * FROM $this->table";

        $statement = $conn->query($sql);
        $users = $statement->fetchAll();

        return $users;
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

    function updateUser($id, $name, $email, $password)
    {
        $conn = $this->connection;

        $sql = "UPDATE $this->table SET name=?,  email=?,  password=? WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$name, $email, $password, $id]);

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

//  $userRepo = new UserRepository;

//  $userRepo->updateUser('1111','SSS','SSS','SSS','SSS','SSS');

?>