<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allproduct extends Model
{
    protected $table = 'all_products';
    protected $guarded=[''];

    public function policyHolders()
    {
        return $this->belongsTo('App\Models\PolicyHolder', 'policy_holder_id');
    }
    public function policyBeneficiaries()
    {
        return $this->belongsTo('App\Models\PolicyBeneficiaries', 'policy_beneficiaries_id');
    }
    public function infos()
    {
        return $this->hasMany(AllProductImushestvoInfo::class, 'all_product_id', 'id');
    }

    public function strahPremiya()
    {
        return $this->hasMany(AllProductsTermsTranshes::class, 'all_products_id');
    }
    static function createAllProduct($request, $policy_holder_id, $policy_beneficiaries_id, $zalogodatel_id = null){

        $new = new Allproduct();
        $new->policy_holder_id = $policy_holder_id;
        $new->policy_beneficiaries_id = $policy_beneficiaries_id;
        $new->zalogodatel_id = $zalogodatel_id;
        $new->unique_number = $request->unique_number;
        $new->insurance_from = $request->insurance_from;
        $new->nomer_dogovor_strah_vigod = $request->nomer_dogovor_strah_vigod;
        $new->date_dogovor_strah_vigod = $request->date_dogovor_strah_vigod;
        $new->object_from_date = $request->object_from_date;
        $new->object_to_date = $request->object_to_date;
        $new->ocenka_osnovaniya = $request->ocenka_osnovaniya;
        $new->location = $request->location;
        if ($request->hasFile('fire_alarm_file')) {
            $image          = $request->file('fire_alarm_file')->store('/img/ZalogImushestvo3x', 'public');
            $new->fire_alarm_file   = $image;
        }
        if ($request->hasFile('security_file')) {
            $image          = $request->file('security_file')->store('/img/ZalogImushestvo3x', 'public');
            $new->security_file   = $image;
        }
        if ($request->hasFile('contract_file')) {
            $image          = $request->file('contract_file')->store('/img/ZalogImushestvo3x', 'public');
            $new->contract_file   = $image;
        }
        if ($request->hasFile('policy_file')) {
            $image          = $request->file('policy_file')->store('/img/ZalogImushestvo3x', 'public');
            $new->policy_file   = $image;
        }
        if ($request->hasFile('application_form_file')) {
            $image          = $request->file('application_form_file')->store('/img/ZalogImushestvo3x', 'public');
            $new->application_form_file   = $image;
        }

        if ($request->hasFile('passport_copy')) {
            $image          = $request->file('passport_copy')->store('/img/ZalogImushestvo3x', 'public');
            $new->passport_copy   = $image;
        }
        if ($request->hasFile('dogovor_copy')) {
            $image          = $request->file('dogovor_copy')->store('/img/ZalogImushestvo3x', 'public');
            $new->dogovor_copy   = $image;
        }
        if ($request->hasFile('spravka_copy')) {
            $image          = $request->file('spravka_copy')->store('/img/ZalogImushestvo3x', 'public');
            $new->spravka_copy   = $image;
        }
        if ($request->hasFile('other_copy')) {
            $image          = $request->file('other_copy')->store('/img/ZalogImushestvo3x', 'public');
            $new->other_copy   = $image;
        }
        $new->franshize_percent_1 = $request->franshize_percent_1;
        $new->franshize_percent_2 = $request->franshize_percent_2;
        $new->franshize_percent_3 = $request->franshize_percent_3;
        $new->insurance_bonus     = $request->insurance_bonus;


        $new->franchise     = $request->franchise;
        $new->insurance_premium_currency     = $request->insurance_premium_currency;
        $new->payment_term     = $request->payment_term;
        $new->sposob_rascheta     = $request->sposob_rascheta;
        $new->tarif_other     = $request->tarif_other;
        $new->premiya_other     = $request->premiya_other;
        $new->insurance_sum     = $request->insurance_sum_prod;

        $new->dogovor_date_from     = $request->dogovor_date_from;
        $new->dogovor_date_to     = $request->dogovor_date_to;
        $new->dogovor_zalog_date_from     = $request->dogovor_zalog_date_from;
        $new->dogovor_zalog_date_to     = $request->dogovor_zalog_date_to;
        $new->credit_insurance_from     = $request->credit_insurance_from;
        $new->credit_insurance_to     = $request->credit_insurance_to;
        $new->defect_comment     = $request->defect_comment;
        $new->defect_image     = $request->defect_image;
        $new->strtahovka_comment     = $request->strtahovka_comment;
        $new->zalog_unique_number     = $request->zalog_unique_number;
        $new->loan_reason     = $request->loan_reason;

        $new->save();
        return $new;
    }
    static function updateAllProduct($id,$request){
        $new =  Allproduct::where('id', $id)->first();
        $new->unique_number = $request->unique_number;
        $new->insurance_from = $request->insurance_from;
        $new->nomer_dogovor_strah_vigod = $request->nomer_dogovor_strah_vigod;
        $new->date_dogovor_strah_vigod = $request->date_dogovor_strah_vigod;
        $new->object_from_date = $request->object_from_date;
        $new->object_to_date = $request->object_to_date;
        $new->ocenka_osnovaniya = $request->ocenka_osnovaniya;
        $new->location = $request->location;
        $new->type = $request->client_type_radio;
        if ($request->hasFile('fire_alarm_file')) {
            $image          = $request->file('fire_alarm_file')->store('/img/ZalogImushestvo3x', 'public');
            $new->fire_alarm_file   = $image;
        }
        if ($request->hasFile('security_file')) {
            $image          = $request->file('security_file')->store('/img/ZalogImushestvo3x', 'public');
            $new->security_file   = $image;
        }
        if ($request->hasFile('contract_file')) {
            $image          = $request->file('contract_file')->store('/img/ZalogImushestvo3x', 'public');
            $new->contract_file   = $image;
        }
        if ($request->hasFile('policy_file')) {
            $image          = $request->file('policy_file')->store('/img/ZalogImushestvo3x', 'public');
            $new->policy_file   = $image;
        }
        if ($request->hasFile('application_form_file')) {
            $image          = $request->file('application_form_file')->store('/img/ZalogImushestvo3x', 'public');
            $new->application_form_file   = $image;
        }

        if ($request->hasFile('passport_copy')) {
            $image          = $request->file('passport_copy')->store('/img/ZalogImushestvo3x', 'public');
            $new->passport_copy   = $image;
        }
        if ($request->hasFile('dogovor_copy')) {
            $image          = $request->file('dogovor_copy')->store('/img/ZalogImushestvo3x', 'public');
            $new->dogovor_copy   = $image;
        }
        if ($request->hasFile('spravka_copy')) {
            $image          = $request->file('spravka_copy')->store('/img/ZalogImushestvo3x', 'public');
            $new->spravka_copy   = $image;
        }
        if ($request->hasFile('other_copy')) {
            $image          = $request->file('other_copy')->store('/img/ZalogImushestvo3x', 'public');
            $new->other_copy   = $image;
        }
        $new->franshize_percent_1 = $request->franshize_percent_1;
        $new->franshize_percent_2 = $request->franshize_percent_2;
        $new->franshize_percent_3 = $request->franshize_percent_3;
        $new->insurance_bonus     = $request->insurance_bonus;


        $new->franchise     = $request->franchise;
        $new->insurance_premium_currency     = $request->insurance_premium_currency;
        $new->payment_term     = $request->payment_term;
        $new->sposob_rascheta     = $request->sposob_rascheta;
        $new->tarif_other     = $request->tarif_other;
        $new->premiya_other     = $request->premiya_other;
        $new->insurance_sum     = $request->insurance_sum_prod;

        $new->dogovor_date_from     = $request->dogovor_date_from;
        $new->dogovor_date_to     = $request->dogovor_date_to;
        $new->dogovor_zalog_date_from     = $request->dogovor_zalog_date_from;
        $new->dogovor_zalog_date_to     = $request->dogovor_zalog_date_to;
        $new->credit_insurance_from     = $request->credit_insurance_from;
        $new->credit_insurance_to     = $request->credit_insurance_to;
        $new->defect_comment     = $request->defect_comment;
        $new->defect_image     = $request->defect_image;
        $new->strtahovka_comment     = $request->strtahovka_comment;
        $new->zalog_unique_number     = $request->zalog_unique_number;
        $new->loan_reason     = $request->loan_reason;

        $new->save();
        return $new;
    }
}
