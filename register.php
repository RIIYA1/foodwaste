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

    // Check if the user already exists
    $check = "SELECT * FROM food WHERE email='$email'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        echo "<h2 style='color: red; text-align: center;'>Email already registered!</h2>";
        echo "<p style='text-align: center;'><a href='register.html'>Try Again</a></p>";
    } else {
        // Insert the new user
        $sql = "INSERT INTO food (email, password) VALUES ('$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "<h2 style='color: green; text-align: center;'>Registration Successful!</h2>";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'login.html';
                    }, 2000);
                  </script>";
        } else {
            echo "<h2 style='color: red; text-align: center;'>Error: " . $conn->error . "</h2>";
        }
    }
} else {
    header("Location: register.html");
    exit();
}

$conn->close();
?>
