<?php
namespace App\Core;

abstract class AbstractUser
{
    protected $username;
    protected $email;
    protected $role;

    public function __construct($username, $email, $role)
    {
        $this->username = $username;
        $this->email = $email;
        $this->role = $role;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getRole()
    {
        return $this->role;
    }

    abstract public function getDashboardMessage();
}