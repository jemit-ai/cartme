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

    protected $baseUrl;
    protected $apiKey;
    protected $baseCurrency;
    protected $targetCurrencies;

    public function __construct()
    {
        $this->baseUrl = config('services.currency.url');
        $this->apiKey  = config('services.currency.key');
        $this->baseCurrency = config('services.currency.base_currency');
        $this->targetCurrencies = config('services.currency.target_currencies');

        Log::info('#Currency rate update job started'.json_encode($this->targetCurrencies));
        
    }
 
    public function getLatestRates(): array
    { 
       
        $url     = $this->baseUrl;
        $apiKey  = $this->apiKey;
        $base    = $this->baseCurrency;
        $targets = $this->targetCurrencies;

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



