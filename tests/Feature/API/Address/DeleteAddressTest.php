<?php

namespace Tests\Feature\API\Address;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Log;

class DeleteAddressTest extends TestCase
{
    public function test_delete_address_success()
    {
        $user = User::factory()->create(['country_id' =>60]);

        $address = Address::factory()->create(['user_id' => $user->id]);

        $response = $this->withHeaders([
            'X-Country' => 'IN',
            'X-Guest-Token' => $user->guest_token,
            'Authorization' => 'Bearer ' . $user->createToken('test')->plainTextToken,
        ])->actingAs($user)->deleteJson('/api/address/' . $address->id);

        Log::info('Delete Address Response:'.$response->getContent());

        $response->assertStatus(200);
    }
}
