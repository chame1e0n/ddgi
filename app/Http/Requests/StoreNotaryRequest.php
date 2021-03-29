<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNotaryRequest extends FormRequest
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
            'phone_insurer' => 'required',
            'payment_bill' => 'required',
            'insurer_type_active' => 'required',
            'mfo_insurer' => 'required',
            'bank_insurer' => 'required|integer',
            'inn' => 'required',
            'okonh_insurer' => 'required',
            'oked_insurer' => 'required',
            'info_personal' => 'required',
            'insurance_from' => 'required',
            'insurance_to' => 'required',
            'geo_zone' => 'required',
            'period_polis' => 'required',
            'polis_id' => 'required',
            'validity_period_from' => 'required',
            'validity_period_to' => 'required',
            'polis_agent' => 'required',
            'polis_mark' => 'required',
            'specialty' => 'required',
            'workExp' => 'required',
            'polis_model' => 'required',
            'polis_modification' => 'required',
            'polis_gos_num' => 'required',
            'polis_teh_passport' => 'required',
            'number' => 'required',
            'director' => 'required',
            'qualified' => 'required',
            'other' => 'required|array',
            'year' => 'required|array',
            'turnover' => 'required|array',
            'earnings' => 'required|array',
            'activity_period_from' => 'required',
            'activity_period_to' => 'required',
            'administrative_case' => 'required',
            'sphereOfActivity' => 'required',
            'profInsuranceServices' => 'required',
            'retransferAktFile' => 'required',
            'wallet' => 'required',
            'payment_term' => 'required',
            'sum_insured' => 'required',
            'franchise' => 'required',
            'insurance_premium' => 'required',
            'polis_series' => 'required',
            'insurance_policy_from' => 'required',
            'litso' => 'required|integer',
            'payment_sum' => 'required_if:payment_term,other|array|required',
            'payment_sum.*'=> 'required_if:payment_term,other',
            'payment_from' => 'array|required_if:payment_term,other|',
            'payment_from.*'=> 'required_if:payment_term,other|',
        ];
    }
}
