<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Http\FormRequest;

class SecondSectionSave extends FormRequest
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
            'second_section_title_en'     => 'required|max:191',
            'second_section_sub_title_en' => 'required|max:191',
            'second_section_content_en'   => 'required',
            'second_section_title_id'     => 'required|max:191',
            'second_section_sub_title_id' => 'required|max:191',
            'second_section_content_id'   => 'required',
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
                    ->errorBag('secondSectionSave')
                    ->redirectTo($this->getRedirectUrl());
    }
}
