<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Allproduct extends Model
{
    use SoftDeletes;
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
    public function informations(){
        return $this->hasMany(AllProductInformation::class, 'all_products_id', 'id');

    }
    //if one information
    public function information(){
        return $this->hasOne(AllProductInformation::class, 'all_products_id', 'id');
    }

    public function strahPremiya()
    {
        return $this->hasMany(AllProductsTermsTranshes::class, 'all_products_id');
    }

    public function zalogodatel()
    {
        return $this->belongsTo(Zalogodatel::class, 'zalogodatel_id');
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
            $image          = $request->file('fire_alarm_file')->store('/img/newProducts', 'public');
            $new->fire_alarm_file   = $image;
        }
        if ($request->hasFile('security_file')) {
            $image          = $request->file('security_file')->store('/img/newProducts', 'public');
            $new->security_file   = $image;
        }
        if ($request->hasFile('contract_file')) {
            $image          = $request->file('contract_file')->store('/img/newProducts', 'public');
            $new->contract_file   = $image;
        }
        if ($request->hasFile('policy_file')) {
            $image          = $request->file('policy_file')->store('/img/newProducts', 'public');
            $new->policy_file   = $image;
        }
        if ($request->hasFile('application_form_file')) {
            $image          = $request->file('application_form_file')->store('/img/newProducts', 'public');
            $new->application_form_file   = $image;
        }

        if ($request->hasFile('passport_copy')) {
            $image          = $request->file('passport_copy')->store('/img/newProducts', 'public');
            $new->passport_copy   = $image;
        }
        if ($request->hasFile('dogovor_copy')) {
            $image          = $request->file('dogovor_copy')->store('/img/newProducts', 'public');
            $new->dogovor_copy   = $image;
        }
        if ($request->hasFile('spravka_copy')) {
            $image          = $request->file('spravka_copy')->store('/img/newProducts', 'public');
            $new->spravka_copy   = $image;
        }
        if ($request->hasFile('other_copy')) {
            $image          = $request->file('other_copy')->store('/img/newProducts', 'public');
            $new->other_copy   = $image;
        }
        if ($request->hasFile('defect_image')) {
            $image          = $request->file('defect_image')->store('/img/newProducts', 'public');
            $new->defect_image   = $image;
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
        $new->strtahovka_comment     = $request->strtahovka_comment;
        $new->zalog_unique_number     = $request->zalog_unique_number;
        $new->loan_reason     = $request->loan_reason;

        $new->insurance_from     = $request->insurance_from;
        $new->credit_dogovor_number     = $request->credit_dogovor_number;
        $new->geo_zone     = $request->geo_zone;

        $new->defect_comment     = $request->defect_comment;
        $new->strtahovka_comment     = $request->defect_comment;

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
            $image          = $request->file('fire_alarm_file')->store('/img/newProducts', 'public');
            $new->fire_alarm_file   = $image;
        }
        if ($request->hasFile('security_file')) {
            $image          = $request->file('security_file')->store('/img/newProducts', 'public');
            $new->security_file   = $image;
        }
        if ($request->hasFile('contract_file')) {
            $image          = $request->file('contract_file')->store('/img/newProducts', 'public');
            $new->contract_file   = $image;
        }
        if ($request->hasFile('policy_file')) {
            $image          = $request->file('policy_file')->store('/img/newProducts', 'public');
            $new->policy_file   = $image;
        }
        if ($request->hasFile('application_form_file')) {
            $image          = $request->file('application_form_file')->store('/img/newProducts', 'public');
            $new->application_form_file   = $image;
        }

        if ($request->hasFile('passport_copy')) {
            $image          = $request->file('passport_copy')->store('/img/newProducts', 'public');
            $new->passport_copy   = $image;
        }
        if ($request->hasFile('dogovor_copy')) {
            $image          = $request->file('dogovor_copy')->store('/img/newProducts', 'public');
            $new->dogovor_copy   = $image;
        }
        if ($request->hasFile('spravka_copy')) {
            $image          = $request->file('spravka_copy')->store('/img/newProducts', 'public');
            $new->spravka_copy   = $image;
        }
        if ($request->hasFile('other_copy')) {
            $image          = $request->file('other_copy')->store('/img/newProducts', 'public');
            $new->other_copy   = $image;
        }
        if ($request->hasFile('defect_image')) {
            $image          = $request->file('defect_image')->store('/img/newProducts', 'public');
            $new->defect_image   = $image;
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
        $new->strtahovka_comment     = $request->strtahovka_comment;
        $new->zalog_unique_number     = $request->zalog_unique_number;
        $new->loan_reason     = $request->loan_reason;

        $new->insurance_from     = $request->insurance_from;
        $new->credit_dogovor_number     = $request->credit_dogovor_number;
        $new->geo_zone     = $request->geo_zone;
        $new->defect_comment     = $request->defect_comment;
        $new->strtahovka_comment     = $request->defect_comment;

        if(empty($request->tarif))
        {
            $new->tarif_other = null;
        }
        if(empty($request->preim))
        {
            $new->premiya_other = null;
        }

        if($request->strtahovka == 0)
        {
            $new->strtahovka_comment = null;
        }
        if($request->deffects == 0)
        {
            $new->defect_comment = null;
            $new->defect_image = null;
        }

        if($request->fire_alarm_file_check == 0)
        {
            $new->fire_alarm_file = null;
        }

        if($request->security_file_check == 0)
        {
            $new->security_file = null;
        }

        $new->save();
        return $new;
    }

    const TS_OSNOVANII = [
        1 => "Тех пасспорт",
        "Доверенность",
        "Договор аренды",
        "Путевой лист"
    ];

    // Объекты находящиеся на площадке строительства
    const OBJECTS_ON_CONSTRUCTION_SITE = [
        'highways' => 'Автомагистрали',
        'bridgesAndOverpasses' => 'Мосты, путепроводы',
        'pipelines' => 'Трубопроводы',
        'railways' => 'Железные дороги',
        'damsAndEmbankments' => 'Дамбы, набережные',
        'groundWays' => 'Наземные пути',
        'waterways' => 'Водные пути',
        'carParks' => 'Автопарковки',
        'lep' => 'ЛЭП',
        'groundLines' => 'Наземные линии',
        'undergroundLines' => 'Подземные линии',
        'undergroundCables' => 'Подземные кабели'
    ];

    public function policyHolder()
    {
        return $this->hasOne(PolicyHolder::class, 'id', 'policy_holder_id')->with('bank');
    }
    public function allProductTermTransh()
    {
        return $this->hasMany(AllProductsTermsTransh::class, 'all_products_id', 'id');
    }

    public function allProductInfo()
    {
        return $this->hasMany(AllProductInformation::class, 'all_products_id', 'id');
    }
    public function zaemshik()
    {
        return $this->hasOne(Zaemshik::class, 'id', 'zaemshik_id');
    }
    public function branches()
    {
        return $this->hasOne(Branch::class, 'id', 'branch_id');
    }

    public function scopeFilter($q)
    {
        if (request('filter_filial')) {
            $q->where('branch_id', request('filter_filial'));
        }

//        if (request('filter_class')) {
//            $q->where('filter_class', request('filter_class'));
//        }

//        if (request('filter_vid')) {
//            $q->where('filter_vid', request('filter_vid'));
//        }

        if (request('filter_data')) {
            $q->where('dogovor_num', request('filter_data'));
        }

        if (request('filter_series_do')) {
            $q->where('polis_series', request('filter_sings'), request('filter_series_do'));
        }

        if (request('filter_data_ot')) {
            $q->where('insurance_from', request('filter_data_ot'));
        }

        if (request('filter_data_do')) {
            $q->where('insurance_to', request('filter_data_do'));
        }
//        if (request('filter_form')) {
//            $q->where('filter_form', request('filter_form'));
//        }
//        if (request('filter_agent')) {
//            $q->allProductInfo->where('otvet_litso', request('filter_agent'));
//        }
        if (request('filter_summ')) {
            $q->where('insurance_sum', request('filter_summ'));
        }
        if (request('filter_preim')) {
            $q->where('insurance_bonus', request('filter_preim'));
        }
//        if (request('filter_kuda')) {
//            $q->where('filter_kuda', request('filter_kuda'));
//        }

        if (request('filter_transh')) {
            $q->where('payment_term', request('filter_transh'));
        }
        if (request('filter_name_strah')) {
            $q->where('policy_holder_id', request('filter_name_strah'));
        }
        if (request('filter_name_vigod')) {
            $q->where('policy_beneficiaries_id', request('filter_name_vigod'));
        }
        if (request('to_user_id')) {
            $q->where('to_user_id', request('to_user_id'));
        }

        return $q;
    }
}
