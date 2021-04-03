<?php

namespace App\Models\Product;

use App\Models\Spravochniki\Agent;
use Illuminate\Database\Eloquent\Model;

class ZalogImushestvo extends Model
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
        return $this->hasMany(ZalogImushestvoInfo::class);
    }
    public function agent(){
        return $this->belongsTo(Agent::class, 'otvet_litso', 'id');
    }
    static function getInfoZalogImushestvo($id)
    {
        $zalogImushestvo = ZalogImushestvo::where('id', $id)->with(['policyHolders', 'policyBeneficiaries', 'infos'])->first();
        return $zalogImushestvo;
    }
    static function createZalogImushestvo($request)
    {
        $zalogImushestvo = ZalogImushestvo::create([

            'dogovor_lizing_num' => $request->dogovor_lizing_num,
            'insurance_from' => $request->insurance_from,
            'insurance_to' => $request->insurance_to,

            'plans' => $request->plans ? true : false,
            'plans_percent' => $request->plans_percent,

            'total_insurance_cost' => $request->total_insurance_cost,
            'zalog_otvet_litso' => $request->zalog_otvet_litso,
            'date_of_issue_police' => $request->date_of_issue_police,
            'policy_series_id' => $request->policy_series_id,
            'place_of_insurance' => $request->place_of_insurance,
            'currency_of_mutual' => $request->currency_of_mutual,

            'insurance_amount_for_closed' => $request->insurance_amount_for_closed,
            'insurance_amount_for_open' => $request->insurance_amount_for_open,
            'strahovaya_purpose_1' => $request->strahovaya_purpose_1,
            'poryadok_oplaty_premii_1' => $request->poryadok_oplaty_premii_1,

            'franshiza_1' => $request->franshiza_1,
            'franshiza_2' => $request->franshiza_2,
            'franshiza_3' => $request->franshiza_3,

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

            'copy_passport' => $request->copy_passport,
            'copy_dogovor' => $request->copy_dogovor,
            'copy_spravki' => $request->copy_spravki,
            'copy_drugie' => $request->copy_drugie,

        ]);
        if($zalogImushestvo)
            return $zalogImushestvo;
        else
            return false;
    }

    static function updateZalogImushestvo($id, $request)
    {
        $zalogImushestvo = ZalogImushestvo::find($id);
        $zalogImushestvo->update([

            'dogovor_lizing_num' => $request->dogovor_lizing_num,
            'insurance_from' => $request->insurance_from,
            'insurance_to' => $request->insurance_to,

            'plans' => $request->plans ? true : false,
            'plans_percent' => $request->plans_percent,

            'total_insurance_cost' => $request->total_insurance_cost,
            'zalog_otvet_litso' => $request->zalog_otvet_litso,
            'date_of_issue_police' => $request->date_of_issue_police,
            'policy_series_id' => $request->policy_series_id,
            'place_of_insurance' => $request->place_of_insurance,
            'currency_of_mutual' => $request->currency_of_mutual,

            'insurance_amount_for_closed' => $request->insurance_amount_for_closed,
            'insurance_amount_for_open' => $request->insurance_amount_for_open,
            'strahovaya_purpose_1' => $request->strahovaya_purpose_1,
            'poryadok_oplaty_premii_1' => $request->poryadok_oplaty_premii_1,

            'franshiza_1' => $request->franshiza_1,
            'franshiza_2' => $request->franshiza_2,
            'franshiza_3' => $request->franshiza_3,

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

            'copy_passport' => $request->copy_passport,
            'copy_dogovor' => $request->copy_dogovor,
            'copy_spravki' => $request->copy_spravki,
            'copy_drugie' => $request->copy_drugie,

        ]);
        if($zalogImushestvo)
            return $zalogImushestvo;
        else
            return false;
    }
}
