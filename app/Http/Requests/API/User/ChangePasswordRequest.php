<?php

namespace App\Http\Requests\API\User;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\User\EmailwithCountry;
use App\Models\Country;


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
        return [
            'email' => [
                'required',
                'email',
                 new EmailwithCountry($countryId),
            ],
            'new_password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6|same:new_password',
        ];
    }


}
