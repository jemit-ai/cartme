<?php

namespace Tests\Feature\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Services\UserService;


class RegisterUserTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;

    public function test_user_can_register()
    {
        //$this->seed(\Database\Seeders\CountriesSeeder::class);

        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe77@example.com',
            'password' => 'password',
        ];

        $response = $this->withHeaders([
            'X-Country' => 'IN'
        ])->postJson('/api/register', $data);


        //$response = $this->post('/api/register', $data);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'user',
            'token',
        ]);
    }


    
}
