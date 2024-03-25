<?php
// Include database connection
include 'db_connect.php';

// Create a new instance of the Database class to establish a connection
$database = new Database();
$conn = $database->conn; // Access the $conn property of the Database object

// Function to retrieve all user ticket bookings
function getAllBookings($conn) {
    $sql = "SELECT * FROM tickets";
    $result = $conn->query($sql);
    $bookings = [];
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $bookings[] = $row;
        }
    }
    return $bookings;
}

// Function to add a new booking
function addBooking($conn, $name, $email, $phone) {
    $sql = "INSERT INTO tickets (name, email, phone) VALUES (:name, :email, :phone)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Function to delete a booking
function deleteBooking($conn, $id) {
    $sql = "DELETE FROM bookings WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// If form is submitted to add a new booking
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    
    // Add booking
    if (addBooking($conn, $name, $email, $phone)) {
        echo "Booking added successfully!";
    } else {
        echo "Error adding booking.";
    }
}

// If a booking deletion request is made
if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    if (deleteBooking($conn, $id)) {
        echo "Booking deleted successfully!";
    } else {
        echo "Error deleting booking.";
    }
}

// Retrieve all user bookings
$tickets = getAllBookings($conn);

?>