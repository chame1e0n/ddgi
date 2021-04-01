<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtvetstvennostRealtorRequest extends FormRequest
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
            'info_personal' => 'required',
            'insurance_from' => 'required',
            'insurance_to' => 'required',
            'geo_zone' => 'required',
            'insurance_premium_currency' => 'required',
            'policy_series_id' => 'array|required',
            'policy_series_id.*'=> 'required|integer',
            'from_date_polis' => 'array|required',
            'from_date_polis.*'=> 'required',
            'to_date_polis' => 'array|required',
            'to_date_polis.*'=> 'required',
            'agent_id' => 'array|required',
            'agent_id.*'=> 'required|integer',
            'insurer_fio' => 'array|required',
            'insurer_fio.*'=> 'required',
            'specialty' => 'array|required',
            'specialty.*'=> 'required',
            'experience' => 'array|required',
            'experience.*'=> 'required',
            'position' => 'array|required',
            'position.*'=> 'required',
            'time_stay' => 'array|required',
            'time_stay.*'=> 'required',
            'insurer_price' => 'array|required',
            'insurer_price.*'=> 'required',
            'insurer_sum' => 'array|required',
            'insurer_sum.*'=> 'required',
            'insurer_premium' => 'array|required',
            'insurer_premium.*'=> 'required',
            'payment_sum'=> 'array|required_if:poryadok_oplaty_premii,other',
            'payment_sum.*'=> 'required_if:poryadok_oplaty_premii,other',
            'payment_from' => 'array|required_if:poryadok_oplaty_premii,other',
            'payment_from.*'=> 'required_if:poryadok_oplaty_premii,other',


            'public_sector_comment' => 'required_if:acted,true',
            'private_sector_comment' => 'required_if:acted,true',

            'prof_riski' => 'required',
            'reason_case' => 'required_if:cases,true',
            'reason_administrative_case' => 'required_if:administrative-case,true',
            'sfera_deyatelnosti' => 'required',
            'limit_otvetstvennosti' => 'required|integer',
            'strahovaya_sum'    => 'required',
            'franshiza' => 'required',
            'strahovaya_purpose' => 'required',
            'serial_number_policy' => 'required',
            'date_issue_policy' => 'required',
            'otvet_litso' => 'required|integer',

            'first_year' => 'required',
            'first_turnover' => 'required',
            'first_profit' => 'required',
            'second_year' => 'required',
            'second_turnover' => 'required',
            'second_profit' => 'required',

            'activity_period_from' => 'required|date',
            'activity_period_to' => 'required|date',
        ];
    }
}
