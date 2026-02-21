<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UniqueEmailPerCountry implements ValidationRule
{

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    protected $countryId;

    public function __construct($countryId)
    {
        $this->countryId = $countryId;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        Log::info('country id;'.$this->countryId);

        Log::info('email;'.$value);

        $user = User::where('email', $value)->where('country_id', $this->countryId)->first();
        

        if ($user) {
            $fail('The email has already been taken in this country.');
        }
        
    }
}
