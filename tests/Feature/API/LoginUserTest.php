<?php

namespace Tests\Feature\API;

use App\Models\Country;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginUserTest extends TestCase
{
    //use RefreshDatabase;

    /**
     * Set up the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(\Database\Seeders\CountriesSeeder::class);
    }

    /**
     * Test that a registered user can log in with valid credentials.
     */
    public function test_user_can_login(): void
    {
        // Arrange: Create a user first
        
        // Act: Attempt to login
        $response = $this->withHeaders([
            'X-Country' => 'IN',
        ])->postJson('/api/login', [
            'email'    => 'john.doe@example.com',
            'password' => 'password',
        ]);

        // Assert: Successful login with token
        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'user' => ['id', 'name', 'email'],
                    'token',
                ],
            ])->assertJson([
                'success' => true,
                'message' => 'User logged in successfully',
            ]);
    }

    
    /**
     * Test that login fails with an incorrect password.
     */
    
    public function test_login_fails_with_wrong_password(): void
    {
        /*$country = Country::where('iso2', 'IN')->first();

        User::factory()->create([
            'email'      => 'john.doe@example.com',
            'password'   => 'password',
            'country_id' => $country->id,
        ]);*/

        $response = $this->withHeaders([
            'X-Country' => 'IN',
        ])->postJson('/api/login', [
            'email'    => 'john.doe@example.com',
            'password' => 'password1%',
        ]);

        $response->assertStatus(401)
            ->assertJson([
                'success' => false,
                'message' => 'Invalid credentials',
            ]);
    }
    

    /**
     * Test that login fails with a non-existent email.
     */
    
    public function test_login_fails_with_nonexistent_email(): void {

        $payload = [
            'email'    => 'nonexistent@example.com',
            'password' => 'password',
        ];

        $response = $this->withHeaders([
            'X-Country' => 'IN',
            'Accept' => 'application/json',
        ])->postJson('/api/login', $payload);

        $response->assertUnauthorized() // cleaner than assertStatus(401)
            ->assertJson([
                'success' => false,
                'message' => 'Invalid credentials',
        ]);
    }
    

    /**
     * Test that login validation rejects missing fields.
     */
    
    public function test_login_validation_requires_email_and_password(): void
    {
        $response = $this->withHeaders([
            'X-Country' => 'IN',
        ])->postJson('/api/login', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email', 'password']);
    }
    

    /**
     * Test that login validation rejects an invalid email format.
     */

    
    public function test_login_validation_rejects_invalid_email(): void
    {
        $response = $this->withHeaders([
            'X-Country' => 'IN',
        ])->postJson('/api/login', [
            'email'    => 'not-an-email',
            'password' => 'password',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }
    



    /**
     * Test that previous tokens are revoked upon new login.
     */

    /*
    public function test_previous_tokens_are_revoked_on_login(): void
    {
        $this->seed(\Database\Seeders\CountriesSeeder::class);

        $country = Country::where('iso2', 'IN')->first();

        $data = [
            'name' => 'John Doe',
            'email' => 'aim@example.com',
            'password' => 'password',
        ];

        $response = $this->withHeaders([
            'X-Country' => 'IN'
        ])->postJson('/api/register', $data);

        // First login — creates a token
        $user->createToken('auth_token');
        $this->assertCount(1, $user->tokens);

        // Second login via API — should revoke old token and issue a new one
        $response = $this->withHeaders([
            'X-Country' => 'IN',
        ])->postJson('/api/login', [
            'email'    => 'aim@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200);

        // After login, the old token should be gone — only the new one remains
        $this->assertCount(1, $user->fresh()->tokens);
    }
    */
    
    
}
