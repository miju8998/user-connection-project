<?php
namespace App\Models;

use App\Core\AbstractUser;

class RegularUser extends AbstractUser
{
    public function __construct($username, $email)
    {
        parent::__construct($username, $email, "user");
    }

    public function getDashboardMessage()
    {
        return "Welcome User, " . $this->username . "!";
    }
}