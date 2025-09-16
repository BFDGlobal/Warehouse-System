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

$item_name = $_POST['item_name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$sql = "INSERT INTO inventory (item_name, quantity, price) VALUES ('$item_name', '$quantity', '$price')";

if ($conn->query($sql) === TRUE) {
    echo "New item added successfully";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
