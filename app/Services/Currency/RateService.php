<?php
namespace App\Services\Currency;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // Ensure session is available if possible
use Throwable;
use Exception; // Use global Exception
use App\Models\Currency;
use Illuminate\Support\Facades\Http;

class RateService
{
 
    /*public function getLatestRates(string $base = 'USD',string $to='INR' ): array
    {
        $url = config('services.currency.url');
        $apiKey = config('services.currency.key');

        $url = "$url?from=$base&to=$to";
        //curl -H "X-API-Key: 78a96c4291-d63606e52b-tc4uu4" https://api.fastforex.io/fetch-one?from=USD&to=EUR

        $response = Http::timeout(30)
            ->retry(3, 1000)
            ->get($url, [
                'access_key' => $apiKey,
                'base' => $base,
            ]);

        if (! $response->successful()) {
            Log::error('Currency API request failed', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            throw new Exception('Failed to fetch currency rates.');
        }

        $data = $response->json();

        if (! isset($data['rates']) || ! is_array($data['rates'])) {
            Log::error('Invalid currency API response', [
                'response' => $data,
            ]);

            throw new Exception('Invalid currency API response.');
        }

        return $data;
    }*/

    public function getLatestRates(string $base = 'USD', array $targets = ['INR', 'GBP', 'AED']): array
    {
        $url    = config('services.currency.url');
        $apiKey = config('services.currency.key');

        $to = implode(',', array_map('strtoupper', $targets));

        $response = Http::timeout(30)
            ->retry(3, 1000)
            ->withHeaders([
                'X-API-Key' => $apiKey,
            ])
            ->get($url, [
                'from' => strtoupper($base),
                'to'   => $to,
            ]);

        if (! $response->successful()) {
            Log::error('Currency API request failed', [
                'status' => $response->status(),
                'body'   => $response->body(),
                'from'   => $base,
                'to'     => $targets,
            ]);

            throw new Exception('Failed to fetch currency rates.');
        }

        $data = $response->json();

        if (! isset($data['results']) || ! is_array($data['results'])) {
            Log::error('Invalid currency API response', [
                'response' => $data,
                'from'     => $base,
                'to'       => $targets,
            ]);

            throw new Exception('Invalid currency API response.');
        }

        return [
            'from'  => strtoupper($base),
            'to'    => $targets,
            'rates' => $data['results'],
            'raw'   => $data,
        ];
    }

}



