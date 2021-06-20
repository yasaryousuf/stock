<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:150',
            'email' => 'nullable|email|min:2|max:150',
            'phone' => 'nullable|min:2|max:150',
            'address' => 'nullable|min:2|max:150',
            'dob' => 'nullable|date',
            'sex' => 'nullable',
            'is_active' => 'nullable',
        ];
    }
}
