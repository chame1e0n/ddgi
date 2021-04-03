<?php

namespace App\Models\Product;

use App\Models\Spravochniki\Agent;
use Illuminate\Database\Eloquent\Model;

class Covid extends Model
{
    protected $guarded = [];

    public function policyHolders()
    {
        return $this->belongsTo('App\Models\PolicyHolder', 'policy_holder_id');
    }
    public function policyBeneficiaries()
    {
        return $this->belongsTo('App\Models\PolicyBeneficiaries', 'policy_beneficiary_id');
    }
    public function infos()
    {
        return $this->hasMany(CovidPolicyInformation::class);
    }
    public function agent(){
        return $this->belongsTo(Agent::class, 'otvet_litso', 'id');
    }
    static function getInfoCovid($id)
    {
        $covid = Covid::where('id', $id)->with(['policyHolders', 'policyBeneficiaries', 'infos'])->first();
        return $covid;
    }
    static function createCovid($request)
    {
        $covid = Covid::create([
            'insurance_from' => $request->insurance_from,
            'insurance_to' => $request->insurance_to,

            'strahovaya_sum' => $request->strahovaya_sum,
            'strahovaya_purpose' => $request->strahovaya_purpose,
            'franshiza' => $request->franshiza,

            'currencies' => $request->currencies,
            'poryadok_oplaty_premii' => $request->poryadok_oplaty_premii,
            'sposob_rascheta' => $request->sposob_rascheta,

            'serial_number_policy' => $request->serial_number_policy,
            'date_issue_policy' => $request->date_issue_policy,
            'otvet_litso' => $request->litso,

            'policy_holder_id' => $request->policy_holder_id,
            'policy_beneficiary_id' => $request->policy_beneficiary_id,

            'anketa_img' => $request->anketa_img,
            'dogovor_img' => $request->dogovor_img,
            'polis_img' => $request->polis_img,

        ]);
        if($covid)
            return $covid;
        else
            return false;
    }
    static function updateCovid($id, $request)
    {
        $covid = Covid::find($id);
        $covid->update([
            'insurance_from' => $request->insurance_from,
            'insurance_to' => $request->insurance_to,

            'strahovaya_sum' => $request->strahovaya_sum,
            'strahovaya_purpose' => $request->strahovaya_purpose,
            'franshiza' => $request->franshiza,

            'currencies' => $request->currencies,
            'poryadok_oplaty_premii' => $request->poryadok_oplaty_premii,
            'sposob_rascheta' => $request->sposob_rascheta,

            'serial_number_policy' => $request->serial_number_policy,
            'date_issue_policy' => $request->date_issue_policy,
            'otvet_litso' => $request->litso,

            'policy_holder_id' => $request->policy_holder_id,
            'policy_beneficiary_id' => $request->policy_beneficiary_id,

            'anketa_img' => $request->anketa_img,
            'dogovor_img' => $request->dogovor_img,
            'polis_img' => $request->polis_img,

        ]);
        if($covid)
            return $covid;
        else
            return false;
    }
}
