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

class UserController extends BaseApiController
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

    public function login(UserLoginRequest $request)
    {
        try {
            $data = $request->validated();
            $result = $this->userService->login($data);

            return $this->successResponse($result, 'User logged in successfully', 200);
        } catch (\Illuminate\Auth\AuthenticationException $e) {
            return $this->errorResponse('Invalid credentials', $e->getMessage(), 401);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return $this->errorResponse('Failed to login user', $th->getMessage(), 500);
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            $data = $request->validated();
            $user = $this->userService->updateProfile($request->user()->id, $data);
            return $this->successResponse($user, 'Profile updated successfully', 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->errorResponse('User not found', $e->getMessage(), 404);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return $this->errorResponse('Failed to update profile', $th->getMessage(), 500);
        }
    }
    
}
