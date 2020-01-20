<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class ThirdSectionSave extends FormRequest
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
            'third_section_title_en'     => 'required|max:191',
            'third_section_sub_title_en' => 'required|max:191',
            'third_section_content_en'   => 'required',
            'third_section_title_id'     => 'required|max:191',
            'third_section_sub_title_id' => 'required|max:191',
            'third_section_content_id'   => 'required',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw (new ValidationException($validator))
                    ->errorBag('thirdSectionSave')
                    ->redirectTo($this->getRedirectUrl());
    }
}
