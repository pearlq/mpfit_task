<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddToOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'product_id' => 'required|exists:products,id',
            'product_count' => 'required|integer|min:1',
            'customer_full_name' => 'required|string',
            'customer_comment' => 'string|nullable',
        ];
    }
}
