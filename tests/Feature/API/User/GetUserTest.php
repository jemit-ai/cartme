<?php
namespace Tests\Feature\API\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\Country;

class GetUserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   
    public function test_user_can_get_profile(): void
    {
        $this->seed(\Database\Seeders\CountriesSeeder::class);

        $country = Country::where('iso2', 'IN')->first();
        $user = User::where(['email' => 'john.doe@example.com', 'country_id' => $country->id])->first();

        if (!$user) {
            $user = User::factory()->create([
                'email' => 'john.doe@example.com',
                'country_id' => $country->id,
            ]);
        }

        Log::info('GetUserTest: ', $user->toArray());

        $response = $this->withHeaders([
            'X-Country' => 'IN',
        ])->actingAs($user)->getJson('/api/user');

        Log::info('GetUserTest'.$response->getContent());

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'id',
                    'name',
                    'email',
                ],
            ])->assertJson([
                'success' => true,
                'message' => 'User retrieved successfully',
            ]);
        
    }

    public function test_user_cannot_get_profile_without_authentication(): void
    {
        $this->seed(\Database\Seeders\CountriesSeeder::class);

        $response = $this->withHeaders([
            'X-Country' => 'IN',
        ])->getJson('/api/user');

        $response->assertStatus(401)
            ->assertJsonStructure([
                'success',
                'message',
                'data',
                'errors',
                'meta',
            ])->assertJson([
                'success' => false,
                'message' => 'Failed to retrieve user',
            ]);
    }

}
