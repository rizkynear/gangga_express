<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class BoatStore extends FormRequest
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
            'image'    => 'required|mimes:jpg,jpeg,png|max:1024'
        ];
    }
}
