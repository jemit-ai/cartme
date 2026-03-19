<?php
namespace App\Jobs;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Services\Currency\RateService;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Jobs\Job;
use App\Models\Currency;
use Throwable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;


class UpdateCurrencyRatesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $backoff = 60;
    public string $baseCurrency;
    public array $targetCurrencies;


    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
        $this->baseCurrency = config('services.currency.base_currency');
        $this->targetCurrencies = config('services.currency.target_currencies');
    }


    /**
     * Execute the job.
     */
    public function handle(RateService $rateService): void
    {
        try {

            $data = $rateService->getLatestRates($this->baseCurrency,$this->targetCurrencies);
            $rates = $data['rates'];
            $rateDate = $data['date'] ?? now()->toDateString();


            Currency::updateOrCreate(
                ['code' => $this->baseCurrency],
                ['rate' => 1, 'is_base' =>1]
            );

            foreach ($rates as $code => $rate) {

                Currency::updateOrCreate(
                    ['code' => $code],
                    ['rate' => $rate, 'is_base' => $code === $this->baseCurrency]
                );

            }

            Log::info('Currency rates updated successfully', [
                'base_currency' => $this->baseCurrency,
                'rate_date' => $rateDate,
                'count' => count($rates),
            ]);
            


        } catch (Throwable $e) {

            Log::error('Currency rate update failed', [
                'base_currency' => $this->baseCurrency,
                'error' => $e->getMessage(),
            ]);

        }

    }

    public function failed(Throwable $e): void
    {
        Log::error('Currency rate update failed', [
            'base_currency' => $this->baseCurrency,
            'error' => $e->getMessage(),
        ]);
    }
}
