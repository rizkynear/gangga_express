<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class CompanyFirstSave extends FormRequest
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
            'first_title_en'     => 'required|max:191',
            'first_sub_title_en' => 'required|max:191',
            'first_content_en'   => 'required',
            'first_title_id'     => 'required|max:191',
            'first_sub_title_id' => 'required|max:191',
            'first_content_id'   => 'required|max:191'
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
                    ->errorBag('companyFirstSave')
                    ->redirectTo($this->getRedirectUrl());
    }
}
