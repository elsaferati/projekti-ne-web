<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "userinfo";
$port = "4306";

$conn = new mysqli($server, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
   
    $user = isset($_POST['user']) ? $_POST['user'] : '';
    $hotel = isset($_POST['hotel']) ? $_POST['hotel'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';

    if (!empty($user) && !empty($date)) {
        $query = "INSERT INTO hoteldata (user, hotel, date) VALUES (?, ?, ?)";
        
        // Prepare and bind parameters
        $statement = $conn->prepare($query);
        $statement->bind_param("sss", $user, $hotel, $date);

        if ($statement->execute()) {
            echo "<script>alert('User has been inserted successfully!');</script>";
        } else {
            echo "Error: " . $conn->error;
        }

        $statement->close();
    } else {
        echo "Error: User and date cannot be empty.";
    }
}

// Close connection (no need to close explicitly as it will be closed automatically when script finishes)
// $conn->close();
?>