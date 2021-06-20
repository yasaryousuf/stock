<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:150',
            'slug' => 'nullable|string|min:2|max:150',
            'details' => 'nullable|string|min:2|max:150',
            'unit' => 'nullable|string|min:2|max:150',
            'parent_id' => 'nullable',
        ];
    }
}
