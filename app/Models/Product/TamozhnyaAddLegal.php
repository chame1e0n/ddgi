<?php

namespace App\Models\Product;

use App\Models\Policy;
use App\Models\Product;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Database\Eloquent\Model;

class TamozhnyaAddLegal extends Model
{
    protected $guarded = [];

    public function strahPremiya()
    {
        return $this->hasMany('App\Models\Product\TamozhnyaAddLegalStrahPremiya');
    }

    public function policyHolders()
    {
        return $this->belongsTo('App\Models\PolicyHolder', 'policy_holder_id');
    }

    static function createTamozhnyaAddLegal($request)
    {
        $tamozhnyaAddLegal = TamozhnyaAddLegal::create([
            'description' => $request->description,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'prof_riski' => $request->prof_riski,
            'pretenzii_in_ruz' => $request->pretenzii_in_ruz,
            'prichina_pretenzii' => $request->prichina_pretenzii,
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
            'type' => $request->client_type_radio,
            'product_id' => $request->product_id,

            'anketa_img' => $request->anketa_img,
            'dogovor_img' => $request->dogovor_img,
            'polis_img' => $request->polis_img,

        ]);
        if($tamozhnyaAddLegal)
            return $tamozhnyaAddLegal;
        else
            return false;
    }

    static function updateTamozhnyaAddLegal($id, $request)
    {
        $tamozhnyaAddLegal = TamozhnyaAddLegal::find($id);
        $tamozhnyaAddLegal->update([
            'description' => $request->description,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'prof_riski' => $request->prof_riski,
            'pretenzii_in_ruz' => $request->pretenzii_in_ruz,
            'prichina_pretenzii' => $request->prichina_pretenzii,
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

            'anketa_img' => $request->anketa_img,
            'dogovor_img' => $request->dogovor_img,
            'polis_img' => $request->polis_img,

        ]);
        if($tamozhnyaAddLegal)
            return $tamozhnyaAddLegal;
        else
            return false;
    }


    static function getInfoTamozhnya($id)
    {
        $tamozhnya = TamozhnyaAddLegal::where('id', $id)->with(['strahPremiya', 'policyHolders'])->first();
        return $tamozhnya;
    }

    public function policy() {
        return $this->hasOne(Policy::class, 'id', 'policy_id');
    }

    public function policySeries() {
        return $this->hasOne(PolicySeries::class, 'id', 'serial_number_policy');
    }

    public function product() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function agent() {
        return $this->hasOne(Agent::class, 'user_id', 'otvet_litso');
    }

}
