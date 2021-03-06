<?php

namespace App\Models\Product;

use App\Models\Policy;
use App\Models\Product;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Database\Eloquent\Model;

class OtvetstvennostPodryadchik extends Model
{
    protected $guarded = [];
    public function strahPremiya()
    {
        return $this->hasMany('App\Models\Product\OtvetstvennostPodryadchikStrahPremiya');
    }

    public function policyHolders()
    {
        return $this->belongsTo('App\Models\PolicyHolder', 'policy_holder_id');
    }
    static function createOtvetstvennostPodryadchik($request)
    {
        $otvetstvennostPodryadchik = OtvetstvennostPodryadchik::create([
            'informaciya_o_personale' => $request->informaciya_o_personale,
            'type' => $request->client_type_radio,
            'product_id' => $request->product_id,
            'insurance_premium_payment_type' => $request->insurance_premium_payment_type,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'geo_zone' => $request->geo_zone,
            'payment_term' => $request->payment_term,
            'currencies' => $request->insurance_premium_currency,
            'strahovaya_sum' => $request->strahovaya_sum,
            'strahovaya_purpose' => $request->strahovaya_purpose,
            'serial_number_policy' => $request->serial_number_policy,
            'date_issue_policy' => $request->date_issue_policy,
            'otvet_litso' => $request->litso,
            'policy_holder_id' => $request->policy_holder_id,

        ]);
        if($otvetstvennostPodryadchik)
            return $otvetstvennostPodryadchik;
        else
            return false;
    }

    static function updateOtvetstvennostPodryadchik($id, $request)
    {
        $otvetstvennostPodryadchik = OtvetstvennostPodryadchik::find($id);
        $otvetstvennostPodryadchik->update([
            'informaciya_o_personale' => $request->informaciya_o_personale,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'geo_zone' => $request->geo_zone,
            'payment_term' => $request->payment_term,
            'currencies' => $request->insurance_premium_currency,
            'strahovaya_sum' => $request->strahovaya_sum,
            'strahovaya_purpose' => $request->strahovaya_purpose,
            'serial_number_policy' => $request->serial_number_policy,
            'date_issue_policy' => $request->date_issue_policy,
            'otvet_litso' => $request->litso,
            'policy_holder_id' => $otvetstvennostPodryadchik->policy_holder_id,
            'insurance_premium_payment_type' => $request->insurance_premium_payment_type,

        ]);
        if($otvetstvennostPodryadchik)
            return $otvetstvennostPodryadchik;
        else
            return false;
    }

    static function getInfoPodryadchik($id)
    {
        $podryadchik = OtvetstvennostPodryadchik::where('id', $id)->with(['strahPremiya', 'policyHolders'])->firstorFail();
        return $podryadchik;
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

