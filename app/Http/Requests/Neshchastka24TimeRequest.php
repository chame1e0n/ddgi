<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Neshchastka24TimeRequest extends FormRequest
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


    public function rules()
    {
        return [
            "fio_insurer" => "required",
          "address_insurer" => "required",
          "tel_insurer" => "required",
          "address_schet" => "required",
          "vid_deyatelnosti" => "required",
          "mfo_insurer" => "required",
          "bank_insurer" => "required|integer",
          "inn_insurer" => "required",
          "okonx" => "required",
          "oked" => "required",
          "fio_beneficiary" => "required",
          "address_beneficiary" => "required",
          "oked_beneficiary" => "required",
          "tel_beneficiary" => "required",
          "beneficiary_schet" => "required",
          "inn_beneficiary" => "required",
          "mfo_beneficiary" => "required",
          "bank_beneficiary" => "required|integer",
          "okonx_beneficiary" => "required",
          "insurance_from" => "required",
          "insurance_to" => "required",
          "geo_zone" => "required",
          "period_polis" => 'array',
          "polis_id" => 'array',
          'polis_id.*'=> 'required',
          "polis_agent" => 'array',
            'polis_agent.*' => 'required',
          "agents" => 'array',
            'agents.*' => 'required',
          "polis_model" => 'array',
            'polis_model.*' => 'required',
            'polis_modification.*' => 'required',
            'polis_gos_num.*' => 'required',
            'polis_teh_passport.*' => 'required',
          "polis_modification" => 'array',
          "polis_gos_num" => 'array',
          "polis_teh_passport" => 'array',
          "polis_num_engine" => 'array',
          "polis_num_body" => 'array',
          "polis_payload" => 'array',
            "polis_num_engine.*" => 'required',
            "polis_num_body.*" => 'required',
            "polis_payload.*" => 'required',
          "strah_sum" => "required",
          "strah_prem" => "required",
          "franshiza" => "required",
          "insurance_premium_currency" => "required",
          "payment_term" => "required",
          "sposob_rascheta" => "required",
          "payment_sum" => 'array',
          "payment_from" => 'array',
          "polis_series" => "required",
          "data_vidachi_polisa" => "required",
          "otvet_litso" => "required",
        ];
    }
}
