<?php

namespace App\Http\Middleware\API;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use App\Models\Country;

class TerritoryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('RAJ'.$request->header('X-Country'));
        $countryCode = $request->header('X-Country') ?? 'IN';
        $country = Country::query()->select(['id', 'name', 'iso2'])->where('iso2', strtoupper($countryCode))->first();

        Log::info('RAJ'.$country);
        $request->merge([
            'country_id' => $country->id,
        ]);

        return $next($request);
    }
}
