<?php
session_start();

// Check if the user is not logged in, redirect to login page
/* if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
} */

require_once('data.php');
require_once('user_bookings.php');

$userRepository = new UserRepository();
$users = $userRepository->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
</head>
<body>
<h1>User Bookings</h1>
    
    <table border="1">
        <tr>
            <th>User</th>
            <th>Hotel</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['user']; ?></td>
                <td><?php echo $user['hotel']; ?></td>
                <td><?php echo $user['date']; ?></td>
                <td><a href="edit.php?id=<?php echo $user['user']; ?>">Edit</a></td>
                <td><a href="delete.php?id=<?php echo $user['user']; ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>