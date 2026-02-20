<?php
namespace App\Services;

use App\Models\User;
use Throwable;
use Exception;


class UserService
{

    public function register($data)
    {
        try{
            return User::create($data);
        }catch(Throwable $th){
            return null;
        }
        
    }
    
}