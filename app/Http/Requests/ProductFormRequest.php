<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
        $rules = [
            'name' => 'required|unique:products',
            'price' => 'required',
        ];

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            // Güncelleme işlemi için, mevcut kaydı unique kontrolünden hariç tutuyoruz
            $rules['name'] = 'required|unique:products,name,' . $this->route('id');
        }

        return $rules;
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
