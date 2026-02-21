<?php
namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UniqueEmailPerCountry;
use App\Models\Country;
use Illuminate\Support\Facades\Log;

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
        $countryCode = $this->header('X-Country');
        //Log::info('RAJ'.$countryCode);
        $countryId = Country::where('iso2', $countryCode)->value('id');

        return [         
            'name' => 'required|string|max:250',
            'email' => [
                'required',
                'email',
                 new UniqueEmailPerCountry($countryId),
            ],
            'password' => 'required|string|min:6',
            'country_id' => 'required|exists:countries,id',
        ];

    }

}
