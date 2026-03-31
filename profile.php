<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h2>Profile Page</h2>
    <p><?php echo $_SESSION["message"]; ?></p>
    <p>Username: <?php echo $_SESSION["username"]; ?></p>
    <p>Email: <?php echo $_SESSION["email"]; ?></p>
    <p>Role: <?php echo $_SESSION["role"]; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>