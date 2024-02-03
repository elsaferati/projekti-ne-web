<?php


$userId = $_GET['id'];
$userRepository = new UserRepository();

// Fetch user details by ID
$user = $userRepository->getUserById($userId);

// Display the form for editing user details
echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <!-- Your head content here -->
        </head>
        <body>
            <h3>Edit User</h3>
            <form action="" method="post">
                <!-- Form fields with values from $user array -->
                <input type="text" name="id" value="'.$user['Id'].'" readonly><br><br>
                <input type="text" name="email" value="'.$user['Email'].'"><br><br>
                <input type="text" name="password" value="'.$user['Password'].'"><br><br>
                <input type="submit" name="editBtn" value="Save"><br><br>
            </form>
        </body>
        </html>';
?>