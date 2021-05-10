<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZalogImushestvo3xRequest extends FormRequest
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
            'insurance_from' => 'required',

            'nomer_dogovor_strah_vigod' => 'required',
            'date_dogovor_strah_vigod' => 'required',

            'object_from_date' => 'required',
            'object_to_date' => 'required',

            'ocenka_osnovaniya' => 'required',
            'location' => 'required',

            'franshize_percent_1' => 'required',
            'franshize_percent_2' => 'required',

            'franshize_percent_3' => 'required',
            'insurance_sum_prod' => 'required',

            'insurance_bonus' => 'required',
            'franchise' => 'required',
            'payment_term' => 'required',


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

        ];
    }
}
