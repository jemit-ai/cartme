<?php

namespace App\Rules\User;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class OtpWithEmailAndCountry implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */

    protected $countryId;
    protected $email;

    public function __construct($countryId,$email)
    {
        $this->countryId = $countryId;
        $this->email = $email;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        
        $user = User::where('email', $this->email)->where('country_id', $this->countryId)->first();
        
        if (!$user) {

            $fail('Invalid credentials.');
            Log::info('Invalid credentials.');

        }else if ($value !== $user->otp) {

            $fail('Invalid OTP.');
            Log::info('Invalid OTP.');
           
        }else if ($user->otp_expires_at < now()) {
            $fail('OTP has expired.');
            Log::info('OTP has expired.');
        }

    }
}
