<?php

namespace App\Rules\User;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class EmailwithCountry implements ValidationRule
{

    protected $countryId;

    public function __construct($countryId)
    {
        $this->countryId = $countryId;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        Log::info('country id;'.$this->countryId);

        Log::info('email;'.$value);

        $user = User::where('email', $value)->where('country_id', $this->countryId)->first();
        

        if (!$user) {

            $fail('Invalid credentials.');
            Log::info('Invalid credentials.');

        }
        
    }
}
