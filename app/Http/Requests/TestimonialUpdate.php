<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialUpdate extends FormRequest
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
            'name'           => 'required|max:255',
            'image'          => 'mimes:jpg,jpeg,png|max:1024',
            'nationality'    => 'required|max:255',
            'description_en' => 'required',
            'description_id' => 'required',
        ];
    }
}
