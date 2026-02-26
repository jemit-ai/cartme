<?php

namespace Tests\Feature\API\Address;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Log;


class UpdatAddressTest extends TestCase
{
    
    public function test_update_address_success()
    {
        $user = User::factory()->create(['country_id' =>60]);

        $address = Address::factory()->create(['user_id' => $user->id]);

        $response = $this->withHeaders([ 
            'X-Country' => 'IN',
            'X-Guest-Token' => $user->guest_token,
        ])->actingAs($user)->putJson('/api/address/' . $address->id, [
            'address_line_1' => 'Updated Address',
            'address_line_2' => 'Updated Address',
            'city' => 'Updated City',
            'state' => 'Updated State',
            'postal_code' => 'Updated Zip',
            'country' => 'Updated Country',
            'phone' => 'Updated Phone',
            'is_default' => true,
        ]);

        Log::info('Update Address Response:'.$response->getContent());

        $response->assertStatus(200);

        


    }
}
