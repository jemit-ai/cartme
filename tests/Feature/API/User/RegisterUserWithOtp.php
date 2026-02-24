<?php

namespace Tests\Feature\API\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Country;
use Illuminate\Support\Facades\Log;


class RegisterUserWithOtp extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    public function test_user_can_register_with_otp(){

        $this->seed(\Database\Seeders\CountriesSeeder::class);

        $data = [
            'name' => 'Aima01',
            'email' => 'aim01@mail.com',
            'password' => 'password',
        ];
        
        $response = $this->withHeaders([
            'X-Country' => 'IN'
        ])->postJson('/api/register', $data);

        $response->assertStatus(201);

        Log::info('Register Response:'.$response->getContent());
        
        $response->assertJsonStructure([
            'data' => [
                'user' => [
                    'id',
                    'name',
                    'email',
                    'country_id',
                ],
                'token',
            ],
        ]);

        $countryId = $response->json('data.user.country_id');

        $this->assertDatabaseHas('users', [
            'email' => $data['email'],
            'name' => $data['name'],
            'country_id' => $countryId,
        ]);


        $otpResponse = $this->withHeaders([
            'X-Country' => 'IN'
        ])->postJson('/api/send-otp', [
            'email' => $data['email'],
        ]);

        if ($otpResponse->status() !== 200) {
            Log::info('OTP Error Response: ' . $otpResponse->getContent());
            // dd($otpResponse->json());
        }

        $otpResponse->assertStatus(200);

        Log::info('OTP Response:'.$otpResponse->getContent());

        //get otp code from response


        $otpCode = $otpResponse->json('data.otp_plain');

        Log::info('OTP Code:'.$otpCode);

        $verifyOtpResponse = $this->withHeaders([
            'X-Country' => 'IN'
        ])->postJson('/api/verify-otp', [
            'email' => $data['email'],
            'otp' => $otpCode,
        ]);

       
        //$verifyOtpResponse->assertStatus(200);

        Log::info('Verify OTP Response:'.$verifyOtpResponse->getContent());
            

        //Log::info('OTP Response:'.$otpResponse->json('data.otp'));

        //Log::info('OTP Response:'.$otpResponse->json('data.otp_sent_at'));

        //Log::info('OTP Response:'.$otpResponse->json('data.is_verified'));

        /*$this->assertDatabaseHas('users', [
            'email' => $data['email'],
            'name' => $data['name'],
            'country_id' => $countryId,
            'otp' => $otpResponse->json('data.otp'),
            'otp_sent_at' => $otpResponse->json('data.otp_sent_at'),
            'is_verified' => $otpResponse->json('data.is_verified'),

        ]);*/



    }
    
}
