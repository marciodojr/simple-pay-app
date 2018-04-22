<?php

namespace SimplePayApp\Service\Auth;

use BadMethodCallException;

class AuthService
{

    public function __construct()
    {

    }

    public function authenticate() 
    {
        throw new BadMethodCallException('Authentication not implemented yet');
    }
}