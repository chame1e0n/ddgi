<?php

namespace App;

use App\Models\PolicyBeneficiaries;
use App\Models\Spravochniki\Branch;
use Illuminate\Database\Eloquent\Model;
use App\Models\PolicyHolder;
use Illuminate\Database\Eloquent\SoftDeletes;

class AllProduct extends Model
{
    use SoftDeletes;
    protected $table = 'all_products';
    protected $guarded = [];

    const TS_OSNOVANII = [
        1 => "Тех пасспорт",
        "Доверенность",
        "Договор аренды",
        "Путевой лист"
    ];

    public function policyHolder()
    {
        return $this->hasOne(PolicyHolder::class, 'id', 'policy_holder_id')->with('bank');
    }
    public function allProductTermTransh()
    {
        return $this->hasMany(AllProductsTermsTransh::class, 'all_products_id', 'id');
    }
    public function policyBeneficiaries()
    {
        return $this->hasOne(PolicyBeneficiaries::class, 'id', 'policy_beneficiaries_id');
    }
    public function allProductInfo()
    {
        return $this->hasOne(AllProductInformation::class, 'all_products_id', 'id');
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
