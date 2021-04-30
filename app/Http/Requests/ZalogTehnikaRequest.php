<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZalogTehnikaRequest extends FormRequest
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






            'plans_percent' => 'required_with:plans',
            'name_property'=> 'array|required',
            'name_property.*'=> 'required',
            'place_property'=> 'array|required',
            'place_property.*'=> 'required',
            'date_of_issue_property'=> 'array|required',
            'date_of_issue_property.*'=> 'required',
            'count_property'=> 'array|required',
            'count_property.*'=> 'required',
            'units_property'=> 'array|required',
            'units_property.*'=> 'required',
            'insurance_cost'=> 'array|required',
            'insurance_cost.*'=> 'required',
            'insurance_sum'=> 'array|required',
            'insurance_sum.*'=> 'required',
            'insurance_premium'=> 'array|required',
            'insurance_premium.*'=> 'required',


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
            'zalog_unique_number' => 'required',
            'dogovor_zalog_date_from' => 'required',
            'dogovor_zalog_date_to' => 'required',
            'dogovor_date_from' => 'required',
            'dogovor_date_to' => 'required',
            'object_from_date' => 'required',
            'object_to_date' => 'required',
            'loan_reason' => 'required',
        ];
    }
}
