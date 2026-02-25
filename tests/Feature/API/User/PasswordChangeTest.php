<?php

namespace Tests\Feature\API\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordChangeTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    
    public function test_password_change_success()
    {
        $user = User::factory()->create([
            'country_id' => 60,
            'password' => bcrypt('password'),
        ]);

        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token, 'X-Country' => 'IN'])->postJson('/api/change-password', [
                'current_password' => 'password',
                'new_password' => 'newpassword',
                'confirm_password' => 'newpassword',
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('message', 'Password changed successfully');
    }

    public function test_password_change_invalid_current_password()
    {
        $user = User::factory()->create([
            'country_id' => 60,
        ]);
        
        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token, 'X-Country' => 'IN'])->postJson('/api/change-password', [
                'current_password' => 'password',
                'new_password' => 'newpassword1',
                'confirm_password' => 'newpassword123',
        ]);

        $response->assertStatus(401)
            ->assertJsonPath('message', 'Invalid current password'); 
    }
    
}
