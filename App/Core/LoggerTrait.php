<?php
namespace App\Core;

trait LoggerTrait
{
    public function logMessage($message)
    {
        return date("Y-m-d H:i:s") . " - " . $message;
    }
}