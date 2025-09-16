<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.html');
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row['id']."</td><td>".$row['item_name']."</td><td>".$row['quantity']."</td><td>".$row['price']."</td><td><button class='btn btn-danger'>Delete</button></td></tr>";
    }
}

$conn->close();
?>
