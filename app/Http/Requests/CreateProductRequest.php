<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|unique:products',
            'price' => 'required',
        ];
    }

    // Custom error messages
    public function messages()
    {
        return [
            'name.required' => 'Name is Required',
            'name.unique' => 'Product Already Exists',
            'price.required' => 'Price is Required',
        ];
    }
}
