<?php

namespace App\Http\Requests\API\Order;

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
           //'shipping_address' => 'required|exists:addresses,id',
           'payment_method' => 'required',
           'order_items' => 'required|array',
           'order_items.*.product_id' => 'required|exists:products,id',
           'order_items.*.quantity' => 'required|integer|min:1',
        ];
    }
}
