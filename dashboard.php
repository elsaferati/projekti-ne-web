<?php
session_start();

// Check if the user is not logged in, redirect to login page
/* if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit;
} */

require_once('config2.php');
require_once('userRepository.php');

$userRepository = new UserRepository();
$users = $userRepository->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
<h1>User Dashboard</h1>
    
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['password']; ?></td>
                <td><a href="edit.php?id=<?php echo $user['id']; ?>">Edit</a></td>
                <td><a href="delete.php?id=<?php echo $user['id']; ?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>