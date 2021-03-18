<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditFinRiskNepogashenAvtocreditRequest extends FormRequest
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
            'inn_insurer' => 'required',
            'mfo_insurer' => 'required',
            'bank_insurer' => 'required|integer',
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
            'z_bank_id' => 'required|integer',
            'z_okonx' => 'required',
            'dogovor_lizing_num' => 'required',
            'insurance_from' => 'required',
            'insurance_to' => 'required',
            'credit_sum' => 'required',
            'credit_purpose' => 'required',
            'date_issue_policy' => 'required',
            'franchise' => 'required',
            'total_sum' => 'required',
            'total_award' => 'required|integer',
            'payment_terms' => 'required',
            'serial_number_policy' => 'required',
            'data_delivery_policy' => 'required|integer',
            'agent_id' => 'required',
        ];
    }
}
