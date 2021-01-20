<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCattle extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'age' => 'required|integer',
            'gender' => 'required|string|min:1|max:254',
            'weight' => 'required|numeric|min:0',
            'health' => 'required|string|min:1|max:254',
            'color' => 'required|string|min:1|max:254',
            'price' => 'required|numeric|min:0',
            'pasture_id' => 'required',
        ];
    }
}
