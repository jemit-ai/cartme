<?php
namespace App\Services;

use App\Models\User;
use Throwable;
use Exception;


class UserService
{
    public $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function register($data){
        try{
            return User::create($data);
        }catch(Exception $e){
            return $e;
        }
    }

    public function login($data){
    
    }

    public function logout(){
    
    }
    
    public function getUser($id){
    
    }
    
}