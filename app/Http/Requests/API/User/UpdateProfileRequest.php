<?php
namespace App\Http\Requests\API\User;
use Illuminate\Foundation\Http\FormRequest;

use App\Models\Country;
use Illuminate\Support\Facades\Log;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $countryCode = $this->header('X-Country');
        $countryId   = Country::where('iso2', $countryCode)->value('id');

        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', new EmailwithCountry($countryId)],
            'password' => 'required|string|min:8',
        ];
    }
}
