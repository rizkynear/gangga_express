<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class CompanySecondSave extends FormRequest
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
            'second_title_en'     => 'required|max:191',
            'second_sub_title_en' => 'required|max:191',
            'second_content_en'   => 'required',
            'second_title_id'     => 'required|max:191',
            'second_sub_title_id' => 'required|max:191',
            'second_content_id'   => 'required|max:191'
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
                    ->errorBag('companySecondSave')
                    ->redirectTo($this->getRedirectUrl());
    }
}
