<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtvetstvennostBrokerRequest extends FormRequest
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
            'okonx' => 'required',
            'oked' => 'required',
            'informaciya_o_personale' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'geo_zone' => 'required',
            'insurance_premium_currency' => 'required',
            'payment_term' => 'required',
            'payment_sum' => 'required_if:payment_term,other|array|required',
            'payment_sum.*'=> 'required_if:payment_term,other',
            'payment_from' => 'array|required_if:payment_term,other|',
            'payment_from.*'=> 'required_if:payment_term,other|',
            'strahovaya_sum' => 'required',
            'strahovaya_purpose' => 'required',
            'serial_number_policy' => 'required',
            'date_issue_policy' => 'required',
            'litso' => 'required|integer',
            ];
    }
}
