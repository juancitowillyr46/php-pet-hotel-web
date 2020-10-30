<?php
namespace App\BackOffice\Security\Domain\Exceptions;

use Exception;

class UserIsNotAdminException extends Exception
{
    public function __construct($message = "", $code = 0) {
        $message = "User is not admin";
        parent::__construct($message, $code);
    }
}