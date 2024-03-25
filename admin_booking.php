<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Bookings</title>
    <link rel="stylesheet" href="styles/shared.css">
    <link rel="stylesheet" href="styles/header.css">
    <script src="script/header.js" type="text/javascript"></script>
    <link rel="stylesheet" href="styles/admin_bookings.css">
</head>
<body>

<?php
    session_start();
    if ($_SESSION['role'] !== 'admin') {
        header('Location: login.html');
        exit();
    }
?>

<main>
    <h1>Hotel Bookings</h1>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Hotel</th>
                <th>Date</th>
                <th>Picture</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $host = 'localhost';
            $username = 'username';
            $password = 'password';
            $dbname = 'database';

            $conn = new mysqli($host, $username, $password, $dbname);

            if ($conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error);
            }

            $sql = 'SELECT * FROM bookings';
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $hotel_id = $row['hotel_id'];
                    $hotel_sql = 'SELECT * FROM hotels WHERE id = ' . $hotel_id;
                    $hotel_result = $conn->query($hotel_sql);
                    $hotel_row = $hotel_result->fetch_assoc();

                    $user_id = $row['user_id'];
                    $user_sql = 'SELECT * FROM users WHERE id = ' . $user_id;
                    $user_result = $conn->query($user_sql);
                    $user_row = $user_result->fetch_assoc();

                    echo '<tr>';
                    echo '<td>' . $user_row['name'] . '</td>';
                    echo '<td>' . $hotel_row['name'] . '</td>';
                    echo '<td>' . $row['date'] . '</td>';
                    echo '<td><img src="' . $hotel_row['picture_url'] . '" alt="Hotel picture"></td>';
                    echo '</tr>';
                }
            }

            $conn->close();
            ?>
        </tbody>
    </table>
    
</main>

</body>
</html>
