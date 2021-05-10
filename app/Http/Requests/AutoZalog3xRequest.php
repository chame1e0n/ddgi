<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutoZalog3xRequest extends FormRequest
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



            /////////
            'object_from_date' => 'required',
            'object_to_date' => 'required',

            'defect_image' => 'required_if:deffects,1',
            'defect_comment' => 'required_if:deffects,1',
            'strtahovka_comment' => 'required_if:strtahovka,1',

            'credit_dogovor_number' => 'required',
            'credit_insurance_from' => 'required',
            'credit_insurance_to' => 'required',

            ///////////
            'policy_number' => 'required|array',
            'policy_series' => 'required|array',
            'god_vipuska' => 'required|array',
            'policy_insurance_from' => 'required|array',
            'policy_insurance_to' => 'required|array',
            'otvet_litso' => 'required|array',
            'marka' => 'required|array',
            'model' => 'required|array',
            'modification' => 'required|array',
            'gos_nomer' => 'required|array',
            'tex_passport' => 'required|array',
            'number_engine' => 'required|array',
            'gryzopodemnost' => 'required|array',
            'strah_stoimost' => 'required|array',
            'strah_sum' => 'required|array',
            'strah_prem' => 'required|array',

            'policy_number.*' => 'required',
            'policy_series.*' => 'required',
            'god_vipuska.*' => 'required',
            'policy_insurance_from.*' => 'required',
            'policy_insurance_to.*' => 'required',
            'otvet_litso.*' => 'required|integer',
            'marka.*' => 'required',
            'model.*' => 'required',
            'modification.*' => 'required',
            'gos_nomer.*' => 'required',
            'tex_passport.*' => 'required',
            'number_engine.*' => 'required',
            'gryzopodemnost.*' => 'required',
            'strah_stoimost.*' => 'required',
            'strah_sum.*' => 'required',
            'strah_prem.*' => 'required',
        ];
    }
}
