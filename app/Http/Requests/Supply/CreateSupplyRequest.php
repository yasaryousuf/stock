<?php

namespace App\Http\Requests\Supply;

use Illuminate\Foundation\Http\FormRequest;

class CreateSupplyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'date' => 'required|date',
            'reference' => 'required|min:2|max:150',
            'note' => 'nullable|min:2|max:150',
            'supplier_id' => 'required',
            'data' => 'required|array',
//            'data.*.quantity' => 'required|numeric',
//            'data.*.unit_price' => 'required|numeric',
        ];
    }
}
