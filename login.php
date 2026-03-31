<?php
session_start();
require "autoload.php";

use App\Services\AuthService;

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $auth = new AuthService();

    if ($auth->login($_POST["email"], $_POST["password"])) {
        header("Location: profile.php");
        exit;
    } else {
        $message = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        Email: <input type="email" name="email" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <p><?php echo $message; ?></p>
    <a href="index.php">Back</a>
</body>
</html>