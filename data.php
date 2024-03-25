<?php
 
$user = 'root';
$password = '';
 
$database = 'userdata';
 
$servername='localhost';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 
$sql = "SELECT * FROM userdata ORDER BY score DESC";
 
if ($result = $mysqli->query($sql)) {
    echo "<table border='1' style='border-collapse: collapse;'>";
    echo "<tr>";
    echo "<th style='background-color: #f2f2f2; padding: 10px;'>Username</th>";
    echo "<th style='background-color: #f2f2f2; padding: 10px;'>Hotel</th>";
    echo "<th style='background-color: #f2f2f2; padding: 10px;'>Date</th>";
    echo "<th style='background-color: #f2f2f2; padding: 10px;'>Time</th>";
    echo "</tr>";
    while($rows=$result->fetch_assoc())
    {
        echo "<tr>";
        echo "<td style='padding: 10px;'>".$rows['username']."</td>";
        echo "<td style='padding: 10px;'>".$rows['hotel']."</td>";
        echo "<td style='padding: 10px;'>".$rows['date']."</td>";
        echo "<td style='padding: 10px;'>".$rows['time']."</td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else {
    echo "Error: " . $mysqli->error;
}
 
$mysqli->close();
?>