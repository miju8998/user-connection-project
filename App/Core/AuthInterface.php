<?php
namespace App\Core;

interface AuthInterface
{
    public function register($username, $email, $password, $role);
    public function login($email, $password);
    public function logout();
}