<?php
// Database connection
$host = 'localhost';
$username = 'root'; // Default XAMPP username
$password = '';     // Default is empty for XAMPP
$database = 'food_waste_db';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$date = $_POST['date'];
$category = $_POST['category'];
$quantity = $_POST['quantity'];
$notes = $_POST['notes'];

// Prepare the SQL statement to prevent SQL Injection
$stmt = $conn->prepare("INSERT INTO waste_logs (log_date, category, quantity, notes) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssds", $date, $category, $quantity, $notes);

// Execute the query
if ($stmt->execute()) {
    echo "<h2>Waste log saved successfully!</h2>";
    echo "<a href='index.html'>Go Back</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
