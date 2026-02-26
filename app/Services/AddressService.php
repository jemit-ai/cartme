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

class AddressService
{
    
    public function addAddress(array $data)
    {

        $guest_token = $data['guest_token'] ?? null;
        $user_id     = $data['user_id'] ?? null;

        $address = Address::create([
            'user_id' => $user_id,
            'guest_token' => $guest_token,
            'address_line_1' => $data['address_line_1'],
            'address_line_2' => $data['address_line_2'],
            'city' => $data['city'],
            'state' => $data['state'],
            'postal_code' => $data['postal_code'],
            'country' => $data['country'],
            'phone' => $data['phone'],
            'is_default' => $data['is_default'],
        ]);
        return $address;
    }

    public function updateAddress(array $data)
    {
        $address = Address::find($data['address_id']);
        $address->update($data);
        return $address;
    }


    public function deleteAddress(array $data)
    {
        $address = Address::find($data['address_id']);
        $address->delete();
        return $address;
    }

    public function getAddresses(array $data)
    {
        
        // Get single address by ID
        if (!empty($data['address_id'])) {
            return Address::find($data['address_id']);
        }

        // Get addresses by user
        if (!empty($data['user_id'])) {
            return Address::where('user_id', $data['user_id'])->get();
        }

        // Get addresses by guest token
        if (!empty($data['guest_token'])) {
            return Address::where('guest_token', $data['guest_token'])->get();
        }

    }
    

}