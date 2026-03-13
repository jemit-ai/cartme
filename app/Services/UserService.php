<?php

namespace App\Services;

use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class UserService
{
    /**
     * Create a new UserService instance.
     */
    public function __construct(protected User $user) {
    }

    /**
     * Register a new user.
     *
     * @param  array<string, mixed>  $data
     * @return User
     *
     * @throws Exception
     */
    public function register(array $data): array
    {
        
        return DB::transaction(function () use ($data) {

                $user = User::create($data);

                $token = $user->createToken('auth_token')->plainTextToken;

                return [
                    'user'  => $user,
                    'token' => $token,
                ];

        });

    }

    /**
     * Authenticate a user and generate an API token.
     *
     * @param  array{email: string, password: string}  $data
     * @return array{user: User, token: string}
     *
     * @throws AuthenticationException
     */
    public function login(array $data): array
    {
        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            throw new AuthenticationException('Invalid credentials.');
        }

        // Revoke all existing tokens before issuing a new one
        $user->tokens()->delete();

        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user'  => $user,
            'token' => $token,
        ];
    }

    /**
     * Revoke all tokens for the currently authenticated user.
     *
     * @param  User  $user
     * @return void
     */
    public function logout(User $user): void
    {
        $user->tokens()->delete();
    }

    /**
     * Retrieve a user by their ID.
     *
     * @param  int  $id
     * @return User
     *
     * @throws ModelNotFoundException
     */
    public function getUser(int $id): User
    {
        return User::findOrFail($id);
    }

    public function updateProfile(int $id, array $data): User
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function changePassword(int $id,array $data)
    {
        //$user = User::findOrFail($id);

        Log::info('Change Password Data: ' . json_encode($data));

        $user = User::where(['country_id' => $data['country_id'], 'email' => $data['email']])->first();

        Log::info('User SQL: ' . json_encode($user));

        //Log::info('User SQL: ' . $user->toSql());

        //Log::info('User SQL: ' . $user->toSql());

        if (!Hash::check($data['password'], $user->password)) {
            throw new AuthenticationException('Invalid current password');
        }

        $user->update([
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }

    /*
    public function disableUser(int $id): User
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'disabled']);
        return $user;
    }

    public function enableUser(int $id): User
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'enabled']);
        return $user;
    }*/

    public function sendOtp(array $data) 
    {
        $country_id = $data['country_id'];

        Log::info('Country ID:'.$country_id);
        Log::info('Email:'.$data['email']);

        $user = User::where(['country_id' => $country_id, 'email' => $data['email']])->first();

        if ($user) {
            // Generate 6-digit OTP
            $otp = random_int(100000, 999999);

            Log::info('OTP:'.$otp);

            $user->update([
                'otp_code' => Hash::make($otp),
                'otp_expires_at' => Carbon::now()->addMinutes(5),
                'otp_verified_at' => null,
            ]);

            $user->otp_plain = $otp;
        }

        return $user;
    }

    public function verifyOtp(array $data)
    {
        $country_id = $data['country_id'];
        Log::info('Verifying OTP for Email: ' . $data['email'] . ' and Country ID: ' . $country_id);

        $user = User::where(['country_id' => $country_id, 'email' => $data['email']])->first();

        if (!$user) {
            Log::error('User not found during OTP verification');
            throw new \Exception('User not found');
        }

        if (Hash::check($data['otp'], $user->otp_code)) {
            Log::info('OTP verified successfully for User ID: ' . $user->id);
            $user->update([
                'otp_verified_at' => Carbon::now(),
                'otp_code' => null, // Clear OTP after success
            ]);
            return $user;
        }

        Log::warning('Invalid OTP provided for User ID: ' . $user->id);
        //throw new \Illuminate\Auth\AuthenticationException('Invalid OTP code');
    }


    public function verifyEmail(array $data)
    {
       Log::info('Verifying Email very modern animated success UI');

       $country_id = $data['country_id'];

       Log::info('Verifying Email very modern animated success UI'.$country_id);

       Log::info('Verifying Email very modern animated success UI'.$data['email']);

       $user = User::where(['country_id' => $country_id, 'email' => $data['email']])->first();

        if (!$user) {
            Log::error('User not found during Email verification');
            throw new \Exception('User not found');
        }

        return $user;

       
    }

    public function resetPassword(array $data)
    {
        $country_id = $data['country_id'];
        Log::info('Resetting Password for Email: ' . $data['email'] . ' and Country ID: ' . $country_id);

        $user = User::where(['country_id' => $country_id, 'email' => $data['email']])->first();

        if (!$user) {
            Log::error('User not found during Password reset');
            throw new \Exception('User not found');
        }

        $user->update([
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }
}