<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class CreditNepogashen extends Model
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
   static function createCreditNePogashen($data)
   {
       $reditNePogashen = CreditNepogashen::create([
           'dogovor_credit_num' => $data['dogovor_credit_num'],
           'credit_from' => $data['credit_from'],
           'credit_to' => $data['credit_to'],
           'credit_validity_period' => $data['credit_validity_period'],
           'credit_sum' => $data['credit_sum'],
           'credit_purpose' => $data['credit_purpose'],
           'other_forms' => $data['other_forms'],
           'total_sum' => $data['total_sum'],
           'total_award' => $data['total_award'],
           'payment_terms' => $data['payment_terms'],
           'serial_number_policy' => $data['passport_issued'],
           'date_issue_policy' => $data['passport_when_issued'],

           'otvet_litso' => $data['litso'],
           'policy_holder_id' => $data['policy_holder_id'],
           'zaemshik_id' => $data['zaemshik_id'],

       ]);
       if($reditNePogashen)
           return $reditNePogashen;
       else
           return false;
   }

   static function getInfoCredit($id)
   {
       $creditNepogashen = CreditNepogashen::where('id', $id)->with(['zaemshik', 'policyHolders'])->firstOrFail();

       return $creditNepogashen;
   }
}
