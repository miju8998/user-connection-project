<?php
namespace App\Models;

use App\Core\AbstractUser;

class Admin extends AbstractUser
{
    public function __construct($username, $email)
    {
        parent::__construct($username, $email, "admin");
    }

    public function getDashboardMessage()
    {
        return "Welcome Admin, " . $this->username . "!";
    }
}