<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?>! ✅</h2>
    <p>You have successfully logged in.</p>
    <a href="index.php">Logout</a>
</body>
</html>