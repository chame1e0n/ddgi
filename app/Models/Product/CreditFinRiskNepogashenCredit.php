<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class CreditFinRiskNepogashenCredit extends Model
{
    protected $guarded = [];

    public function zaemshik()
    {
        return $this->belongsTo('App\Models\Zaemshik');
    }

    public function policyHolders()
    {
        return $this->belongsTo('App\Models\PolicyHolder', 'policy_holder_id');
    }

    static function UpdateOrCreateCreditFinRiskNepogashenCredits($data, $id = false){
        $page = self::find($id);
        $return = self::UpdateOrCreate(['id' => $id],[
            'dogovor_lizing_num' => $data['dogovor_lizing_num'],
            'insurance_from' => $data['insurance_from'],
            'insurance_to' => $data['insurance_to'],
            'credit_sum' => $data['credit_sum'],
            'credit_purpose' => $data['credit_purpose'],
            'date_issue_policy' => $data['date_issue_policy'],
            'total_sum' => $data['total_sum'],
            'total_award' => $data['total_award'],
            'payment_terms' => $data['payment_terms'],
            'serial_number_policy' => $data['serial_number_policy'],
            'data_delivery_policy' => $data['data_delivery_policy'],
            'policy_holder_id' => $data['policy_holder_id'] ?? $page->policyHolders->id,
            'zaemshik_id' => $data['zaemshik_id'] ?? $page->zaemshik->id,
            'agent_id' => $data['agent_id'] ,
            'other_forms' => $data['other_forms'],
        ]);
        return $return;
    }
}
