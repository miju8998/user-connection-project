<?php
session_start();
require "autoload.php";

use App\Services\AuthService;

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $auth = new AuthService();
    $success = $auth->register(
        $_POST["username"],
        $_POST["email"],
        $_POST["password"],
        $_POST["role"]
    );

    $message = $success ? "Registration successful." : "Registration failed.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post">
        Username: <input type="text" name="username" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        Role:
        <select name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select><br><br>
        <button type="submit">Register</button>
    </form>
    <p><?php echo $message; ?></p>
    <a href="index.php">Back</a>
</body>
</html>