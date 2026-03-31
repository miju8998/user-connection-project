<?php
namespace App\Services;

use App\Core\AuthInterface;
use App\Core\Database;
use App\Core\LoggerTrait;
use App\Models\Admin;
use App\Models\RegularUser;
use PDO;

class AuthService implements AuthInterface
{
    use LoggerTrait;

    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function register($username, $email, $password, $role)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([$username, $email, $hashedPassword, $role]);
    }

    public function login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["username"] = $user["username"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["role"] = $user["role"];

            if ($user["role"] === "admin") {
                $obj = new Admin($user["username"], $user["email"]);
            } else {
                $obj = new RegularUser($user["username"], $user["email"]);
            }

            $_SESSION["message"] = $obj->getDashboardMessage();
            return true;
        }

        return false;
    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }
}