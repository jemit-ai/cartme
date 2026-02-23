<?php
namespace App\Http\Controllers\API\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

use App\Http\Requests\API\User\UserRegisterRequest;
use App\Http\Requests\API\User\UserLoginRequest;

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
        //Log::info('Tim'.$data);
        $user = $this->userService->register($data);
        return $this->successResponse($user, 'User registered successfully',201);

      } catch (Throwable $th) {

        Log::error($th->getMessage());
        return $this->errorResponse('Failed to register user', $th->getMessage(), 500);

      }
       
    }

    function login(UserLoginRequest $request){

      try {
        
        $data = $request->validated();
        //Log::info('Tim'.$data);
        $user = $this->userService->login($data);
        return $this->successResponse($user, 'User logged in successfully',200);

      } catch (Throwable $th) {

        Log::error($th->getMessage());
        return $this->errorResponse('Failed to login user', $th->getMessage(), 500);

      }
       
    }
    
}
