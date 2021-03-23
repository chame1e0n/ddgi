<?php

namespace App\Models\Product;

use App\Models\Spravochniki\Agent;
use Illuminate\Database\Eloquent\Model;

class TamozhnyaAdd extends Model
{
    protected $guarded = [];

    public function strahPremiya()
    {
        return $this->hasMany('App\Models\Product\TamozhnyaAddStrahPremiya');
    }

    public function policyHolders()
    {
        return $this->belongsTo('App\Models\PolicyHolder', 'policy_holder_id');
    }
    public function policyBeneficiaries()
    {
        return $this->belongsTo('App\Models\PolicyBeneficiaries', 'policy_beneficiary_id');
    }

    public function agent(){
        return $this->belongsTo(Agent::class, 'otvet_litso', 'id');
    }

    static function createTamozhnyaAdd($request)
    {
        $tamozhnyaAdd = TamozhnyaAdd::create([
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'warehouse_volume' => $request->warehouse_volume,
            'product_volume' => $request->product_volume,
            'product_volume_unit' => $request->product_volume_unit,
            'total_sum' => $request->total_sum,
            'na_sklade_from_date' => $request->na_sklade_from_date,
            'na_sklade_to_date' => $request->na_sklade_to_date,

            'payment_term' => $request->payment_term,
            'currencies' => $request->insurance_premium_currency,
            'sposob_rascheta' => $request->sposob_rascheta,
            'strahovaya_sum' => $request->strahovaya_sum,
            'strahovaya_purpose' => $request->strahovaya_purpose,
            'franshiza' => $request->franshiza,


            'serial_number_policy' => $request->serial_number_policy,
            'date_issue_policy' => $request->date_issue_policy,
            'otvet_litso' => $request->litso,
            'policy_holder_id' => $request->policy_holder_id,
            'policy_beneficiary_id' => $request->policy_beneficiary_id,

            'anketa_img' => $request->anketa_img,
            'dogovor_img' => $request->dogovor_img,
            'polis_img' => $request->polis_img,

        ]);
        if($tamozhnyaAdd)
            return $tamozhnyaAdd;
        else
            return false;
    }

    static function updateTamozhnyaAdd($id, $request)
    {
        $tamozhnyaAdd = TamozhnyaAdd::find($id);
        $tamozhnyaAdd->update([
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'warehouse_volume' => $request->warehouse_volume,
            'product_volume' => $request->product_volume,
            'product_volume_unit' => $request->product_volume_unit,
            'total_sum' => $request->total_sum,
            'na_sklade_from_date' => $request->na_sklade_from_date,
            'na_sklade_to_date' => $request->na_sklade_to_date,

            'payment_term' => $request->payment_term,
            'currencies' => $request->insurance_premium_currency,
            'sposob_rascheta' => $request->sposob_rascheta,
            'strahovaya_sum' => $request->strahovaya_sum,
            'strahovaya_purpose' => $request->strahovaya_purpose,
            'franshiza' => $request->franshiza,


            'serial_number_policy' => $request->serial_number_policy,
            'date_issue_policy' => $request->date_issue_policy,
            'otvet_litso' => $request->litso,
            'policy_holder_id' => $request->policy_holder_id,
            'policy_beneficiary_id' => $request->policy_beneficiary_id,

            'anketa_img' => $request->anketa_img,
            'dogovor_img' => $request->dogovor_img,
            'polis_img' => $request->polis_img,

        ]);
        if($tamozhnyaAdd)
            return $tamozhnyaAdd;
        else
            return false;
    }

    static function getInfoTamozhnya($id)
    {
        $tamozhnya = TamozhnyaAdd::where('id', $id)->with(['strahPremiya', 'policyHolders', 'policyBeneficiaries'])->first();
        return $tamozhnya;
    }
}
