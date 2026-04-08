<?php

namespace App\Http\Middleware\API;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class GuestTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() && !$request->header('X-Guest-Token')) {

            /*$guestToken = (string) Str::uuid();
            Log::info('Guest Token:'.$guestToken);*/

            $ip = $request->ip(); // Get client IP
            $userAgent = $request->header('User-Agent'); // Browser info

                // Create a unique token using IP + browser + random salt
            $guestToken = hash('sha256', $ip . '|' . $userAgent);

            Log::info('Guest Token: ' . $guestToken);

            $request->headers->set('X-Guest-Token', $guestToken);
            
        }

        return $next($request);
    }
}
