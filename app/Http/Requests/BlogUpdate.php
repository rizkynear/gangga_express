<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogUpdate extends FormRequest
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
            'title_id'       => 'required|max:191',
            'description_id' => 'required',
            'title_en'       => 'required|max:191',
            'description_en' => 'required',
            'image'          => 'mimes:jpg,jpeg,png|dimensions:max_width=2500,max_height=2500|max:5120'
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
            'image.max' => 'Image must be 5mb or less'
        ];
    }
}
