<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Controllers\API\BaseApiController;
use Exception;
use Illuminate\Support\Facades\Log;
use Throwable;

class RegisterController extends BaseApiController
{
    public $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(UserRegisterRequest $request){

      try {
        
        $data = $request->validated();
        $user = $this->userService->register($data);
        return $this->successResponse($user, 'User registered successfully',201);

      } catch (Throwable $th) {

        Log::error($th->getMessage());
        return $this->errorResponse('Failed to register user', $th->getMessage(), 500);

      }
       
    }
    
}
