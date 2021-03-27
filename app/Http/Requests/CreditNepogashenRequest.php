<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditNepogashenRequest extends FormRequest
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
            'oked' => 'required',


            'z_fio' => 'required',
            'z_address' => 'required',
            'z_phone' => 'required',
            'passport_series' => 'required',
            'passport_number' => 'required',
            'passport_issued' => 'required',
            'passport_when_issued' => 'required',
            'z_checking_account' => 'required',
            'z_inn' => 'required',
            'z_mfo' => 'required',
            'z_bank_id' => 'required',
            'z_okonx' => 'required',


            'dogovor_credit_num' => 'required',
            'credit_from' => 'required',
            'credit_to' => 'required',
            'credit_sum' => 'required',
            'credit_purpose' => 'required',
            'credit_validity_period' => 'required',
            'other_forms' => 'required',
            'total_sum' => 'required',
            'total_award' => 'required',
            'payment_terms' => 'required',

            'polis_series' => 'required',
            'date_issue_policy' => 'required',
            'litso' => 'required',
        ];
    }
}
