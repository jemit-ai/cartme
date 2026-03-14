<?php

namespace App\Http\Requests\API\User;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\User\EmailwithCountry;
use App\Models\Country;
use Illuminate\Support\Facades\Log;
//use App\Rules\User\UniqueEmailPerCountry;

class ChangePasswordRequest extends FormRequest
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

        return [
            'email' => [
                'required',
                'email',
                 new EmailwithCountry($countryId),
            ],
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'The new password field is required.',
            'password.min' => 'The new password must be at least 6 characters long.',
            'password.confirmed' => 'The new password confirmation does not match.',
        ];
    }


}
