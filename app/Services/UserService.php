<?php
namespace App\Services;

use App\Models\User;

class UserService
{

    public function register($data)
    {
        return User::create($data);
    }
    
}