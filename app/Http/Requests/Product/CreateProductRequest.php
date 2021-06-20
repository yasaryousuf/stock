<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:150',
            'code' => 'required|min:2|max:150',
            'description' => 'nullable|min:2|max:150',
            'category_id' => 'required',
        ];
    }
}
