<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZalogAutozalogMnogostoronniyRequest extends FormRequest
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
            'product_id'  => 'required',
            'fio_insurer' => 'required',
            'address_insurer' => 'required',
            'tel_insurer' => 'required',
            'checking_account' => 'required',
            'mfo_insurer' => 'required',
            'bank_insurer' => 'required|integer',
            'inn_insurer' => 'required',
            'oked' => 'required',
            'okonx' => 'required',
            'fio_beneficiary' => 'required',
            'address_beneficiary' => 'required',
            'tel_beneficiary' => 'required',
            'beneficiary_schet' => 'required',
            'inn_beneficiary' => 'required',
            'mfo_beneficiary' => 'required',
            'bank_beneficiary' => 'required',
            'oked_beneficiary' => 'required',

            'unique_number' => 'required',









            'payment_sum'=> 'array|required_if:payment_term,transh',
            'payment_sum.*'=> 'required_if:payment_term,transh',
            'payment_from' => 'array|required_if:payment_term,transh',
            'payment_from.*'=> 'required_if:payment_term,transh',

            'tarif_other' => 'required_with:tarif',
            'premiya_other' => 'required_with:preim',

            //--Залогодатель--//
            'fio_zalog' => 'required',
            'address_zalog' => 'required',
            'phone_zalog' => 'required',
            'checking_account_zalog' => 'required',
            'inn_zalog' => 'required',
            'mfo_zalog' => 'required',
            'oked_zalog' => 'required',

            /////////
            'object_from_date' => 'required',
            'object_to_date' => 'required',
            'loan_reason' => 'required',

            'defect_image' => 'required_if:deffects,1',
            'defect_comment' => 'required_if:deffects,1',
            'strtahovka_comment' => 'required_if:strtahovka,1',

            'insurance_from' => 'required',
            'credit_dogovor_number' => 'required',
            'credit_insurance_from' => 'required',
            'credit_insurance_to' => 'required',
            'geo_zone' => 'required',
        ];
    }
}
