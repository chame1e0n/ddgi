<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CovidRequest extends FormRequest
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
            'passport_series' => 'sometimes|required',
            'passport_number' => 'sometimes|required',

            'fio_beneficiary' => 'required',
            'address_beneficiary' => 'required',
            'tel_beneficiary' => 'required',
            'beneficiary_schet' => 'required',
            'inn_beneficiary' => 'required',
            'mfo_beneficiary' => 'required',
            'bank_beneficiary' => 'required',
            'oked_beneficiary' => 'required',
            'seria_passport' => 'sometimes|required',
            'nomer_passport' => 'sometimes|required',

            'person_surname.*'=> 'required',
            'person_name.*'=> 'required',
            'person_lastname.*'=> 'required',
            'series_and_number_passport.*'=> 'required',
            'date_of_issue_passport.*'=> 'required',
            'place_of_issue_passport.*'=> 'required',
            'policy_series_id.*'=> 'required',
            'insurance_cost.*'=> 'required',
            'insurance_sum.*'=> 'required',
            'insurance_premium.*'=> 'required',

            'payment_sum'=> 'array|required_if:poryadok_oplaty_premii,transh',
            'payment_sum.*'=> 'required_if:poryadok_oplaty_premii,transh',
            'payment_from' => 'array|required_if:poryadok_oplaty_premii,transh',
            'payment_from.*'=> 'required_if:poryadok_oplaty_premii,transh',

            'strahovaya_sum' => 'required',
            'strahovaya_purpose' => 'required',
            'serial_number_policy' => 'required',
            'date_issue_policy' => 'required',
            'litso' => 'required|integer',
            'franshiza' => 'required',
        ];
    }
}
