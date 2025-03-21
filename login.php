<?php
// Database Connection
$host = "localhost";
$username = "root";
$password = "";
$database = "foodwaste";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM food WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Success Message with redirect
        echo "<h2 style='color: green; text-align: center;'>Login Successful! Redirecting to Home...</h2>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'index.html';
                }, 2000);
              </script>";
        exit();
    } else {
        // Error message with link back to login
        echo "<h2 style='color: red; text-align: center;'>Invalid Email or Password!</h2>";
        echo "<p style='text-align: center;'><a href='login.html'>Try Again</a></p>";
    }
} else {
    // Direct access to login.php without POST
    header("Location: login.html");
    exit();
}
?>
