<?php

namespace App\Services;


interface UserService
{
    function login(String $email, String $password): bool;

    function findByEmail(String $email);

    function register(String $name, String $email, String $password);
}
