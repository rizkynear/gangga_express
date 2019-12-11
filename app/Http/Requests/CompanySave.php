<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanySave extends FormRequest
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
            'title_en'     => 'required|max:191',
            'sub_title_en' => 'required|max:191',
            'content_en'   => 'required',
            'title_id'     => 'required|max:191',
            'sub_title_id' => 'required|max:191',
            'content_id'   => 'required|max:191',
        ];
    }
}
