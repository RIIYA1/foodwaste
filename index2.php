<?php
session_start();
include 'db.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = md5($_POST['password']);  // Note: Use password_hash in production!

    $sql = "SELECT * FROM food WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login Success - Set session or redirect
        $_SESSION['email'] = $email;
        header("Location: index.html"); // Create a dashboard page later
        exit();
    } else {
        // Login Failed
        $error = "Invalid Email or Password!";
    }
}
?>