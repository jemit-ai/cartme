<?php
namespace App\Http\Requests\API\User;


use Illuminate\Foundation\Http\FormRequest;
use App\Rules\User\UniqueEmailPerCountry;
use App\Models\Country;
use Illuminate\Support\Facades\Log;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:250',
            'email' => [
                'required',
                'email',
                 new UniqueEmailPerCountry($countryId),
            ],
            'password' => 'required|string|min:6|confirmed',
            //'country_id' => 'required|exists:countries,id',
        ];

    }

}
