<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TamozhnyaAddRequest extends FormRequest
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
            'mfo_insurer' => 'required',
            'bank_insurer' => 'required|integer',
            'inn_insurer' => 'required',
            'oked_beneficiary' => 'required',

            'fio_beneficiary' => 'required',
            'address_beneficiary' => 'required',
            'tel_beneficiary' => 'required',
            'beneficiary_schet' => 'required',
            'inn_beneficiary' => 'required',
            'mfo_beneficiary' => 'required',
            'bank_beneficiary' => 'required',
            'okonh_beneficiary' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'warehouse_volume' => 'required',
            'product_volume' => 'required',
            'total_sum' => 'required',
            'na_sklade_from_date' => 'required',
            'na_sklade_to_date' => 'required',
            'insurance_premium_currency' => 'required',
            'payment_term' => 'required',
            'sposob_rascheta' => 'required|integer',
            'payment_sum' => 'required_if:payment_term,other|array',
            'payment_sum.*'=> 'required_if:payment_term,other',
            'payment_from' => 'array|required_if:payment_term,other',
            'payment_from.*'=> 'required_if:payment_term,other',
            'strahovaya_sum' => 'required',
            'strahovaya_purpose' => 'required',
            'serial_number_policy' => 'required',
            'date_issue_policy' => 'required',
            'litso' => 'required|integer',
            'franshiza' => 'required',


//            'anketa_img' => 'required',
//            'dogovor_img' => 'required',
//            'polis_img' => 'required',

        ];
    }
}
