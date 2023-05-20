<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
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
            'title' => 'required|min:3|max:140',
            'content' => 'required|string|max:65535',
            'cuklim'=> 'required|numeric|between:0,9999.99',
            'oglhidrati' => 'required|numeric|between:0,9999.99',
            'insultips' => 'required|min:3|max:140',
            'insuldev' => 'required|integer|min:0|max:9999',
            'kordev' => 'required|integer|min:0|max:9999',
        ];
    }
}
