<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrediFinRiskNepogashenAvtocredit extends Model
{
    protected $table = 'credit_fin_risk_nepogashen_avtocredits';
    protected $guarded = [];

    static function createCreditFinRiskNepogashenAvtocredits($request, $policyHolder_id, $zaemshiks_id){
//        dd($request->all());
        $return = self::create([
            'dogovor-lizing-num' => $request->post('dogovor-lizing-num'),
            'insurance_from' => $request->post('insurance_from'),
            'insurance_to' => $request->post('insurance_to'),
            'credit_sum' => $request->post('credit_sum'),
            'credit_purpose' => $request->post('credit_purpose'),
            'franchise' => $request->post('franchise'),
            'date_issue_policy' => $request->post('date_issue_policy'),
            'total_sum' => $request->post('total_sum'),
            'total_award' => $request->post('total_award'),
            'payment_terms' => $request->post('payment_terms'),
            'serial_number_policy' => $request->post('serial_number_policy'),
            'data_delivery_policy' => $request->post('data_delivery_policy'),
            'policy_holder_id' => $policyHolder_id,
            'zaemshik_id' => $zaemshiks_id,
            'agent_id' => $request->post('agent_id'),
        ]);
        return $return;
    }
}
