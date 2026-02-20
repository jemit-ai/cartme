<?php
namespace App\Services;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // Ensure session is available if possible
use Throwable;
use Exception; // Use global Exception
use App\Models\Currency;

class CurrencyService
{

    public function convert($amount, $from, $to)
    {
        if ($from === $to) {
            return round($amount, 2);
        }

        $fromRate = Currency::where('code', $from)->value('rate');
        $toRate   = Currency::where('code', $to)->value('rate');

        if (!$fromRate || !$toRate) {
            return null;
        }

        // Step 1: Convert to base
        $amountInBase = $amount / $fromRate;

        // Step 2: Convert from base to target
        $converted = $amountInBase * $toRate;

        return round($converted, 2);
    }

    public function getBaseCurrency()
    {
        return Currency::where('is_base', true)->value('code');
    }

}