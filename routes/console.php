<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Jobs\UpdateCurrencyRatesJob;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


//Artisan::command('update-currency-rates')->call(UpdateCurrencyRatesJob::class);


Artisan::command('update-currency-rates', function () {
    UpdateCurrencyRatesJob::dispatch('USD');
    $this->info('Currency rates update job dispatched successfully.');
});


Schedule::command('update-currency-rates')->everyMinute()->withoutOverlapping()->runInBackground(); 
