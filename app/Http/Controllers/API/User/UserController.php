<?php
namespace App\Http\Controllers\API\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\AddressService;
use App\Services\CartService;

use App\Http\Requests\API\User\RegisterRequest;
use App\Http\Requests\API\User\LoginRequest;
use App\Http\Requests\API\User\GetProfileRequest;
use App\Http\Requests\API\User\UpdateProfileRequest;
use App\Http\Requests\API\User\SendOtpRequest;
use App\Http\Requests\API\User\VerifyOtpRequest;
use App\Http\Requests\API\User\ChangePasswordRequest;
use App\Http\Requests\API\User\EmailVerifyRequest;

use App\Http\Controllers\API\BaseApiController;
use Exception;
use Illuminate\Support\Facades\Log;
use Throwable;
use Illuminate\Auth\AuthenticationException;

class UserController extends BaseApiController
{
    public $userService;
    public $addressService;

    public function __construct(UserService $userService,AddressService $addressService)
    {
        $this->userService = $userService;
        $this->addressService = $addressService;
    }

    public function register(RegisterRequest $request){

      try {
        
        $data = $request->validated();
        $data['country_id'] = $request->country_id;
        $user = $this->userService->register($data);
        return $this->successResponse($user, 'User registered successfully',201);

      } catch (Throwable $th) {

        Log::error($th->getMessage());
        return $this->errorResponse('Failed to register user', $th->getMessage(), 500);

      }
       
    }

    public function login(LoginRequest $request)
    {
        try {

            $data = $request->validated();

            $sessionId = $request->header('X-Guest-Token');
            $userId = $request->user()?->id ?? 0;

            $result = $this->userService->login($data);

            CartService::mergeGuestCartToUser($sessionId,$userId);

            return $this->successResponse($result, 'User logged in successfully', 200);

        } catch (AuthenticationException $e) {
            return $this->errorResponse('Invalid credentials', $e->getMessage(), 401);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return $this->errorResponse('Failed to login user', $th->getMessage(), 500);
        }
    }

    public function updateProfile(UpdateProfileRequest $request)
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

    public function logout(Request $request)
    {
        try {
            $this->userService->logout($request->user()->id);
            return $this->successResponse(null, 'User logged out successfully', 200);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return $this->errorResponse('Failed to logout user', $th->getMessage(), 500);
        }
    }

    public function getUser(Request $request)
    {
        try {
 
            //Log::info('Get Profile Before Request', $request->all());
            
            if (!$request->user()) {
                return $this->errorResponse('Unauthorized', 'User not authenticated', 401);
            }

            Log::info('Get User Request: ' . json_encode($request->user()->id));
            
            $user = $this->userService->getUser($request->user()->id);
            return $this->successResponse($user, 'User retrieved successfully', 200);

        } catch (Throwable $th) {

            Log::error($th->getMessage());
            return $this->errorResponse('Failed to retrieve user', $th->getMessage(), 500);

        }
    }
  
    public function sendOtp(SendOtpRequest $request)
    {
        Log::info('Entering sendOtp controller method');
        try {

            $data = $request->validated();
            $data['country_id'] = $request->country_id;

            $dataString = json_encode($data);
            Log::info('Send OTP Request Function:'.$dataString);

            $user = $this->userService->sendOtp($data);
            return $this->successResponse($user, 'OTP sent successfully', 200);

        } catch (Throwable $th) {   
            //Log::error($th->getMessage());
            return $this->errorResponse('Failed to send OTP', $th->getMessage(), 500);
        }
    }

    public function verifyOtp(VerifyOtpRequest $request)
    {
        Log::info('Entering verifyOtp controller method');
        try {

            $data = $request->validated();
            $data['country_id'] = $request->country_id;
            
            Log::info('Verify OTP Data: ' . json_encode($data));

            $user = $this->userService->verifyOtp($data);

            Log::info('Verify OTP Success for User: ' . $user->email);
            return $this->successResponse($user, 'OTP verified successfully', 200);

        } catch (Throwable $th) {
            
            Log::error('Verify OTP Error: ' . $th->getMessage());
            return $this->errorResponse('Failed to verify OTP', $th->getMessage(), 500);
        }
    }
    
    public function changePassword(ChangePasswordRequest $request){

        try {

            $data = $request->validated();
            $data['country_id'] = $request->country_id;

            $userid = $request->user()->id ?? 0;
            $user = $this->userService->changePassword($userid, $data);
            return $this->successResponse($user, 'Password changed successfully', 200);

        } catch (AuthenticationException $e) {

            return $this->errorResponse('Invalid current password', $e->getMessage(), 401);

        } catch (Throwable $th) {

            Log::error($th->getMessage());
            return $this->errorResponse('Failed to change password', $th->getMessage(), 500);

        }

    }

    public function addAddress(AddressRequest $request){

        try {
            $data = $request->validated();
            $data['guest_token'] = $request->header('X-Guest-Token');
            Log::info('Add Address Data: ' . json_encode($data));

            if($request->user()){
                $data['user_id'] = $request->user()->id;
                $user = $this->addressService->addAddress($data);
            }else{
                $user = $this->addressService->addAddress($data);
            }
            return $this->successResponse($user, 'Address added successfully', 201);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return $this->errorResponse('Failed to add address', $th->getMessage(), 500);
        }

    }

    public function getAddresses(Request $request){

        try {
            $user = $request->user();
            $addresses = $this->addressService->getAddresses($user->id);
            return $this->successResponse($addresses, 'Addresses retrieved successfully', 200);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return $this->errorResponse('Failed to retrieve addresses', $th->getMessage(), 500);
        }
        
    }

    public function updateAddress(UpdateAddressRequest $request){

        try {
            $data = $request->validated();
            $data['guest_token'] = $request->header('X-Guest-Token');
            Log::info('Update Address Data: ' . json_encode($data));

            if($request->user()){
                $data['user_id'] = $request->user()->id;
                $user = $this->addressService->updateAddress($data);
            }else{
                $user = $this->addressService->updateAddress($data);
            }
            return $this->successResponse($user, 'Address updated successfully', 200);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return $this->errorResponse('Failed to update address', $th->getMessage(), 500);
        }

    }

    public function deleteAddress(DeleteAddressRequest $request){

        try {
            $data = $request->validated();
            $data['guest_token'] = $request->header('X-Guest-Token');
            Log::info('Delete Address Data: ' . json_encode($data));

            if($request->user()){
                $data['user_id'] = $request->user()->id;
                $user = $this->addressService->deleteAddress($data);
            }else{
                $user = $this->addressService->deleteAddress($data);
            }
            return $this->successResponse($user, 'Address deleted successfully', 200);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return $this->errorResponse('Failed to delete address', $th->getMessage(), 500);
        }

    }

    public function setDefaultAddress(SetDefaultAddressRequest $request){

        try {
            $data = $request->validated();
            $data['guest_token'] = $request->header('X-Guest-Token');
            Log::info('Set Default Address Data: ' . json_encode($data));

            if($request->user()){
                $data['user_id'] = $request->user()->id;
                $user = $this->addressService->setDefaultAddress($data);
            }else{
                $user = $this->addressService->setDefaultAddress($data);
            }
            return $this->successResponse($user, 'Default address set successfully', 200);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return $this->errorResponse('Failed to set default address', $th->getMessage(), 500);
        }

    }

    /*
    public function forgotPassword(ForgotPasswordRequest $request){

        try {
            $data = $request->validated();
            $data['guest_token'] = $request->header('X-Guest-Token');
            Log::info('Forgot Password Data: ' . json_encode($data));
            $data['country_id'] = $request->country_id;

            if($request->user()){
                $data['user_id'] = $request->user()->id;
                $user = $this->userService->forgotPassword($data);
            }else{
                $user = $this->userService->forgotPassword($data);
            }
            return $this->successResponse($user, 'Forgot password successfully', 200);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return $this->errorResponse('Failed to forgot password', $th->getMessage(), 500);
        }

    }
    
    public function verifyForgotPassword(VerifyForgotPasswordRequest $request){

        try {
            $data = $request->validated();
            $data['guest_token'] = $request->header('X-Guest-Token');
            $data['country_id'] = $request->country_id;

            Log::info('Verify Forgot Password Data: ' . json_encode($data));

            if($request->user()){
                $data['user_id'] = $request->user()->id;
                $user = $this->userService->verifyForgotPassword($data);
            }else{
                $user = $this->userService->verifyForgotPassword($data);
            }
            return $this->successResponse($user, 'Verify forgot password successfully', 200);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return $this->errorResponse('Failed to verify forgot password', $th->getMessage(), 500);
        }

    }

    public function resetPassword(ResetPasswordRequest $request){

        try {
            $data = $request->validated();
            $data['guest_token'] = $request->header('X-Guest-Token');
            $data['country_id'] = $request->country_id;

            Log::info('Reset Password Data: ' . json_encode($data));

            if($request->user()){
                $data['user_id'] = $request->user()->id;
                $user = $this->userService->resetPassword($data);
            }else{
                $user = $this->userService->resetPassword($data);
            }
            return $this->successResponse($user, 'Reset password successfully', 200);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return $this->errorResponse('Failed to reset password', $th->getMessage(), 500);
        }

    }
    */

    public function verifyEmail(EmailVerifyRequest $request){
        try {
            $data = $request->validated();
            $data['guest_token'] = $request->header('X-Guest-Token');
            $data['country_id'] = $request->country_id;

            $user = $this->userService->verifyEmail($data);
            return $this->successResponse($user, 'Email verified successfully', 200);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return $this->errorResponse('Failed to verify email', $th->getMessage(), 500);
        }
    }

    public function resetPassword(Request $request)
    {
        try {
            $data = $request->all();
            $data['country_id'] = $request->country_id;

            $user = $this->userService->resetPassword($data);
            return $this->successResponse($user, 'Password reset successfully', 200);
        } catch (Throwable $th) {
            Log::error('Reset Password Error: ' . $th->getMessage());
            return $this->errorResponse('Failed to reset password', $th->getMessage(), 500);
        }
    }
}
