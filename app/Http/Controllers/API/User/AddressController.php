<?php
namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AddressService;

use App\Http\Requests\API\Address\AddressRequest;
use App\Http\Requests\API\Address\UpdateAddressRequest;
use App\Http\Requests\API\Address\DeleteAddressRequest;
use App\Http\Requests\API\Address\SetDefaultAddressRequest;

use App\Http\Controllers\API\BaseApiController;
use Exception;
use Illuminate\Support\Facades\Log;
use Throwable;

class AddressController extends BaseApiController
{
    public $addressService;

    public function __construct(AddressService $addressService) {
        $this->addressService = $addressService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        try {

            $data['guest_token'] = $request->header('X-Guest-Token');

            if($request->user()){
                $data['user_id'] = $request->user()->id;
            }
            
            $addresses = $this->addressService->getAddresses($data);
            return $this->successResponse($addresses, 'Addresses retrieved successfully', 200);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return $this->errorResponse('Failed to retrieve addresses', $th->getMessage(), 500);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request)
    {
        //
        try {

            $data = $request->validated();
            $data['guest_token'] = $request->header('X-Guest-Token');
            Log::info('Add Address Data: ' . json_encode($data));

            if($request->user()){
                $data['user_id'] = $request->user()->id;
            }

            $user = $this->addressService->addAddress($data);
            return $this->successResponse($user, 'Address added successfully', 201);

        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return $this->errorResponse('Failed to add address', $th->getMessage(), 500);
        }

    }

    /**
     * Display the specified resource.
     */

    public function show(string $id, Request $request)
    {
        try {
            
            $data['address_id'] = $id;
            $data['guest_token'] = $request->header('X-Guest-Token');

            Log::info('Update Address Data: ' . json_encode($data));

            if ($request->user()) {
                $data['user_id'] = $request->user()->id;
            }

            $addresses = $this->addressService->getAddresses($data);
            return $this->successResponse($addresses, 'Addresses retrieved successfully', 200);

        } catch (Throwable $th) {

            Log::error($th->getMessage());
            return $this->errorResponse('Failed to retrieve addresses', $th->getMessage(), 500);

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, UpdateAddressRequest $request)
    {
        try {
            $data = $request->validated();
            // Include the address ID from the route so the service can locate the record
            $data['address_id'] = $id;
            $data['guest_token'] = $request->header('X-Guest-Token');

            Log::info('Update Address Data: ' . json_encode($data));

            if ($request->user()) {
                $data['user_id'] = $request->user()->id;
            }
            // Service will handle both authenticated and guest updates
            $address = $this->addressService->updateAddress($data);
            return $this->successResponse($address, 'Address updated successfully', 200);

        } catch (Throwable $th) {

            Log::error($th->getMessage());
            return $this->errorResponse('Failed to update address', $th->getMessage(), 500);

        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
          try {
            
            $data['address_id'] = $id;
            $data['guest_token'] = $request->header('X-Guest-Token');

            Log::info('Delete Address Data: ' . json_encode($data));

            if($request->user()){
                $data['user_id'] = $request->user()->id;
            }

            $user = $this->addressService->deleteAddress($data);

            return $this->successResponse($user, 'Address deleted successfully', 200);
        } catch (Throwable $th) {
            Log::error($th->getMessage());
            return $this->errorResponse('Failed to delete address', $th->getMessage(), 500);
        }

    }
}
