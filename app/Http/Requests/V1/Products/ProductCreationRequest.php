<?php

namespace App\Http\Requests\V1\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "product_name"=>"required|string",
            "reference"=>"required",
            "price"=>"required|numeric|min:0",
            "weight"=>"required|numeric|min:0",
            "stock"=>"required|integer|min:0",
        ];
    }
}