<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KascoRequest extends FormRequest
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
          "fio_insurer" => 'required',
          "address_insurer" => 'required',
          "tel_insurer" => 'required',
          "address_schet" => 'required',
          "inn_insurer" => 'required',
          "mfo_insurer" => 'required',
          "bank_insurer" => 'required|integer',
          "okonh" => 'okonh',
          "fio_beneficiary" => 'required',
          "address_beneficiary" => 'required',
          "tel_beneficiary" => 'required',
          "beneficiary_schet" => 'required',
          "inn_beneficiary" => 'required',
          "mfo_beneficiary" => 'required',
          "bank_beneficiary" => 'required|integer',
          "okonx_beneficiary" => 'required',
          "insurance_from" => 'required',
          "insurance_to" => 'required',
          "reason" => 'required',
          "geo_zone" => 'required',
          "policy_series_id" => 'array|required',
          "polis_god_vupyska" => 'array|required',
          "polis_date_from" => 'array|required',
          "polis_date_to" => 'array|required',
          "policy_agent_id" => 'array|required',
          "polis_marka" => 'array|required',
          "polis_model" => 'array|required',
          "polis_gos_nomer" => 'array|required',
          "polis_nomer_tex_passporta" => 'array|required',
          "polis_nomer_dvigatelya" => 'array|required',
          "polis_nomer_kuzova" => 'array|required',
          "polis_gruzopodoemnost" => 'array|required',
          "polis_strah_value" => 'array|required',
          "polis_strah_sum" => 'array|required',
          "polis_strah_premia" => 'array|required',
          "mark_model" => 'array|required',
          "name" => 'array|required',
          "series_number" => 'array|required',
          "insurance_sum" => 'array|required',
          "cover_terror_attacks_sum" => 'array|required',
          "cover_terror_attacks_currency" => "required",
          "cover_terror_attacks_insured_sum" => 'array|required',
          "cover_terror_attacks_insured_currency" => "required",
          "coverage_evacuation_cost" => 'array|required',
          "coverage_evacuation_currency" => "required",
          "other_insurance_info" => 'array|required',
          "one_sum" => 'array|required',
          "one_premia" => 'array|required',
          "one_franshiza" => 'array|required',
          "tho_sum" => 'array|required',
          "two_preim" => 'array|required',
          "driver_quantity" => 'array|required',
          "driver_one_sum" => 'array|required',
          "driver_currency" => 'array|required',
          "driver_total_sum" => 'array|required',
          "driver_preim_sum" => 'array|required',
          "passenger_quantity" => 'array|required',
          "passenger_one_sum" => 'array|required',
          "passenger_currency" => 'array|required',
          "passenger_total_sum" => 'array|required',
          "limit_quantity" => 'array|required',
          "limit_one_sum" => 'array|required',
          "limit_currency" => 'array|required',
          "limit_total_sum" => 'array|required',
          "limit_preim_sum" => 'array|required',
          "total_liability_limit" => 'array|required',
          "total_liability_limit_currency" => 'array|required',
          "policy_id" => 'array|required',
          "from_date" => 'array|required',
          "agent_id" => 'array|required',
          "payment" => 'array|required',
          "payment_order" => 'array|required',
          "overall_sum" => 'array|required',
          "strahovaya_sum" => "required",
          "strahovaya_purpose" => "required",
          "franshiza" => "required",
          "insurance_premium_currency" => "required",
          "payment_term" => "required",
          "sposob_rascheta" => "required",
          "payment_sum" => 'array',
          "payment_from" => 'array',
          "polis_series" => "required",
          "insurance_from_date" => "required",
          "otvet_litso" => "required|integer",
        ];
    }
}
