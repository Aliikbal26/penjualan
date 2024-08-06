<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements UserService
{
    function login(String $email, String $password): bool
    {
        return Auth::attempt([
            "email" => $email,
            "password" => $password
        ]);
    }

    function findByEmail(String $email)
    {
        // for ($i=0; $i < ; $i++) { 
        //     # code...
        // }
        return User::where('email', $email)->first();
        // return User::pluck("email");
        // User::query()->find($email);
    }

    function register(String $name, String $email, String $password)
    {
        return User::create([
            "name" => $name,
            "email" => $email,
            "password" => Hash::make($password)
        ]);
    }
}
