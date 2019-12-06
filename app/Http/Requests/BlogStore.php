<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogStore extends FormRequest
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
            'title_id' => 'required|max:255',
            'description_id' => 'required',
            'title_en' => 'required|max:255',
            'description_en' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:1024',
        ];
    }
}
