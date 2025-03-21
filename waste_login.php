<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "waste_logs";  // Your database name is waste_logs

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
?>
