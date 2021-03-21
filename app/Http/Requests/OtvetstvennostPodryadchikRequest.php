<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtvetstvennostPodryadchikRequest extends FormRequest
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
            'fio_insurer' => 'required',
            'address_insurer' => 'required',
            'tel_insurer' => 'required',
            'address_schet' => 'required',
            'vid_deyatelnosti' => 'required',
            'mfo_insurer' => 'required',
            'bank_insurer' => 'required|integer',
            'inn_insurer' => 'required',
            'okonh_insurer' => 'required',
            'oked' => 'required',
            'informaciya_o_personale' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'geo_zone' => 'required',
            'insurance_premium_currency' => 'required',
            'payment_term' => 'required',
            'payment_sum' => 'array|required',
            'payment_sum.*'=> 'required',
            'payment_from' => 'array|required',
            'payment_from.*'=> 'required',
            'strahovaya_sum' => 'required',
            'strahovaya_purpose' => 'required',
            'serial_number_policy' => 'required',
            'date_issue_policy' => 'required',
            'litso' => 'required|integer',
            ];
    }
}