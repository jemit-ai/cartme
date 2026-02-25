<?php

namespace Tests\Feature\API\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Log;

class AddressTest extends TestCase
{

    public function test_add_address()
    {

        $user = User::factory()->create([
            'country_id'=>60
        ]);

        $Response = $this->withHeaders([ 
            'X-Country' => 'IN',
            'Authorization' => 'Bearer ' . $user->createToken('test')->plainTextToken,
        ])->postJson('/address', [
            
            'address_line_1'=>'123 Main St',
            'address_line_2'=>'Suite 456',
            'city'=>'Anytown',
            'state'=>'CA',
            'postal_code'=>'12345',
            'country'=>'USA',
            'phone'=>'123-456-7890',
            'is_default'=>true

        ]);

        

        $Response->assertStatus(201);

        Log::info('Add Address Response:'.$Response->getContent());
        
        
    }
    
    public function test_add_address_for_guest_user()
    {

        $user = User::factory()->create([
            'country_id'=>60
        ]);

        $Response = $this->withHeaders([ 
            'X-Country' => 'IN',
            'X-Guest-Token' => $user->guest_token,
        ])->postJson('/address', [
            
            'address_line_1'=>'123 Main St',
            'address_line_2'=>'Suite 456',
            'city'=>'Anytown',
            'state'=>'CA',
            'postal_code'=>'12345',
            'country'=>'USA',
            'phone'=>'123-456-7890',
            'is_default'=>true

        ]);

        

        $Response->assertStatus(201);

        Log::info('Add Address Response:'.$Response->getContent());
        
        
    }


}
