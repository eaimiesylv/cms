<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
  

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|String|Max:55',
            'content'=>'required|String',
            'post_image'=>'nullable|file',
            '1'=>'nullable',
            '2'=>'nullable',
            '3'=>'nullable',
            '4'=>'nullable',
            '5'=>'nullable',
            '6'=>'nullable',
            '7'=>'nullable',
            '8'=>'nullable',
        ];
    }
}
