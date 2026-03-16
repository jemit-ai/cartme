<?php
namespace App\Http\Requests\API\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Country;
//use App\Rules\User\UniqueEmailPerCountry;
use App\Rules\User\EmailwithCountry;
use App\Rules\User\OtpWithEmailAndCountry;
use Illuminate\Support\Facades\Log;

class VerifyOtpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $countryCode = $this->header('X-Country');
        $countryId = Country::where('iso2', $countryCode)->value('id');
        $email = $this->request->get('email');
        Log::info('email rule'.$email);
        return [
            'email' => [
                'required',
                'email',
                 new EmailwithCountry($countryId),
            ],
            'otp' => ['required', 'size:6'],
        'otp.*' => ['required', 'digits:1', new OtpWithEmailAndCountry($countryId,$this->email)],
            'type'  => 'required|in:register,reset-password',
        ];
    }
}
