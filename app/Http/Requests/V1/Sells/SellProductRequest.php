<?php

namespace App\Http\Requests\V1\Sells;

use App\Traits\Reportable;
use Illuminate\Foundation\Http\FormRequest;

class SellProductRequest extends FormRequest
{
    use Reportable;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "product_id" => "required|exists:products,id",
            "amount" => "integer|min:1"
        ];
    }

    public function messages()
    {
        return [
            "amount.min" => "You must have to take 1 of these product"
        ];
    }
}
