<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BaseApiController extends Controller
{
    //

    protected function successResponse($data = null,string $message = 'Success',int $code = 200,array $meta = []) 
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
            'errors'  => null,
            'meta'    => (object) $meta
        ], $code);

    }


    protected function errorResponse(string $message = 'Error',$errors = null, int $code = 400)
    {

        return response()->json([
            'success' => false,
            'message' => $message,
            'data'    => null,
            'errors'  => $errors,
            'meta'    => (object) []
        ], $code);

    }


    


}
