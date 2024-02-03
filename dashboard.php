<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php 
        $userRepository = new UserRepository();

        $users = $userRepository->getAllUsers();

        foreach($users as $user){
            echo 
            "
            <tr>
                <td>$user[Id]</td>
                <td>$user[Email]</td>
                <td>$user[Password]</td>
                <td><a href='edit.php?id=$user[Id]'>Edit</a></td>
                <td><a href='delete.php?id=$user[Id]'>Delete</a></td>
            </tr>
            ";
        }
        ?><?php
        
        $userRepository = new UserRepository();
        
        $users = $userRepository->getAllUsers();
        
        echo '<table border="1">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>';
        
        foreach($users as $user) {
            echo "<tr>
                    <td>{$user['Id']}</td>
                    <td>{$user['Email']}</td>
                    <td>{$user['Password']}</td>
                    <td><a href='edit.php?id={$user['Id']}'>Edit</a></td>
                    <td><a href='delete.php?id={$user['Id']}'>Delete</a></td>
                  </tr>";
        }
        
        echo '</table>';
        ?>
    </table>

</body>
</html>
