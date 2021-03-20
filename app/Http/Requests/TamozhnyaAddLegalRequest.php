<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TamozhnyaAddLegalRequest extends FormRequest
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
            'description' => 'required',

            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'prof_riski' => 'required',
            'pretenzii_in_ruz' => 'required|integer',
            'prichina_pretenzii' => 'required_if:pretenzii_in_ruz,1',

            'insurance_premium_currency' => 'required',
            'payment_term' => 'required',
            'sposob_rascheta' => 'required|integer',
            'payment_sum' => 'sometimes|nullable|array',
            'payment_sum.*'=> 'sometimes|nullable',
            'payment_from' => 'sometimes|nullable|array',
            'payment_from.*'=> 'sometimes|nullable',
            'strahovaya_sum' => 'required',
            'strahovaya_purpose' => 'required',
            'serial_number_policy' => 'required',
            'date_issue_policy' => 'required',
            'litso' => 'required|integer',
            'franshiza' => 'required',

//            'anketa_img' => 'required',
//            'dogovor_img' => 'required',
//            'polis_img' => 'required',

        ];
    }
}
