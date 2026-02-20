<?php
namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueEmailPerCountry;

class UserRegisterRequest extends FormRequest
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
            
            'name' => 'required|string|max:255',
            //'email' => 'required|email|unique:users,email',
            'email' => [
                'required',
                'email',
                new UniqueEmailPerCountry($this->country_id),
            ],
            'password' => 'required|string|min:6',
            'country_id' => 'required|exists:countries,id',

        ];
    }
}
