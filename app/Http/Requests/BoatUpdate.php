<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoatUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required|max:255',
            'engine'   => 'required|max:255',
            'capacity' => 'required|numeric',
            'length'   => 'required|numeric',
            'width'    => 'required|numeric',
            'image'    => 'mimes:jpg,jpeg,png|max:3072'
        ];
    }

    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'image.max' => 'Image must be 3mb or less'
        ];
    }
}
