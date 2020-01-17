<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingStore extends FormRequest
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
            'booking_type'           => 'required',
            'adult'                  => 'required|numeric',
            'child'                  => 'required|numeric',
            'infant'                 => 'required|numeric',
            'total_passenger'        => 'required|numeric',
            'contact_name'           => 'required|max:191',
            'contact_phone'          => 'required|max:14',
            'contact_email'          => 'required|email:filter|max:191',
            'departure_date'         => 'required',
            'departure_time'         => 'required',
            'departure_arrival_time' => 'required',
            'departure_route'        => 'required',
            'name.*'                 => 'required|max:191',
            'nationality.*'          => 'required|max:191',
            'age.*'                  => 'required|numeric',
            'address.*'              => 'required',
            'category.*'             => 'required|max:191',
            'currency'               => 'required|numeric',
            'basket'                 => 'required'
        ];
    }
}
