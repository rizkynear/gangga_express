<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestinationUpdate extends FormRequest
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
            'name'      => 'required|max:255',
            'location'  => 'required|max:255',
            'latitude'  => 'required',
            'longitude' => 'required',
            'image'     => 'mimes:jpg,jpeg,png|max:2048'
        ];
    }
}
