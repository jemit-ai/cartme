<?php

namespace Tests\Feature\API\Address;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Log;

class GetAddressTest extends TestCase
{
    /*public function test_get_address_success()
    {
        $user = User::factory()->create(['country_id' =>60]);

        $address = Address::factory()->create(['user_id' => $user->id]);

        $response = $this->withHeaders([ 
            'X-Country' => 'IN',
            'X-Guest-Token' => $user->guest_token,
            'Authorization' => 'Bearer ' . $user->createToken('test')->plainTextToken,
        ])->actingAs($user)->getJson('/api/address/' . $address->id);

        Log::info('Get Address Response:'.$response->getContent());

        $response->assertStatus(200);

    }
    
    public function test_get_all_address_success(){

        Log::info('Get All Address Test');

        $user = User::factory()->create(['country_id' =>60]);

        $address = Address::factory()->create(['user_id' => $user->id]);

        $response = $this->withHeaders([ 
            'X-Country' => 'IN',
            'X-Guest-Token' => $user->guest_token,
            'Authorization' => 'Bearer ' . $user->createToken('test')->plainTextToken,
        ])->actingAs($user)->getJson('/api/address');

        Log::info('Get All Address Response:'.$response->getContent());

        $response->assertStatus(200);

        
    }
    */
    

    public function test_get_guest_address_success(){

        Log::info('Get Guest Address Test');

        $user = User::factory()->create(['country_id' =>60]);


        $guest_token = $user->guest_token;

        //$guest_token = $user->createToken('test')->plainTextToken;

        $address = Address::factory()->create(['guest_token' => $guest_token]);

        $response = $this->withHeaders([ 
            'X-Country' => 'IN',
            'X-Guest-Token' => $guest_token,
        ])->getJson('/api/address/' . $address->id);

        Log::info('Get Guest Address Response:'.$response->getContent());

        $response->assertStatus(200);

    }
    
}
