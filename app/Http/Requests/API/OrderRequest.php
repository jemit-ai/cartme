<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
           'billing_first_name' => 'required',
           'billing_last_name' => 'required',
           'billing_email' => 'required|email:rfc',
           'billing_phone' => 'required|digits:10',
           'billing_address' => 'required',
           'billing_city' => 'required',
           'billing_state' => 'required',
           'billing_postcode' => 'required',
           'billing_country' => 'required',
           'payment_method' => 'required',
           'order_items' => 'required|array',
           'order_items.*.product_id' => 'required|exists:products,id',
           'order_items.*.quantity' => 'required|integer|min:1',
        ];
    }
}
