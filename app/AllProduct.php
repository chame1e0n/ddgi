<?php

namespace App;

use App\Models\PolicyBeneficiaries;
use Illuminate\Database\Eloquent\Model;
use App\Models\PolicyHolder;
use Illuminate\Database\Eloquent\SoftDeletes;

class AllProduct extends Model
{
    use SoftDeletes;
    protected $table = 'all_products';
    protected $guarded = [];

    public function policyHolder()
    {
        return $this->hasOne(PolicyHolder::class, 'id', 'policy_holder_id')->with('bank');
    }
    public function allProductCurrencyTerms()
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
}
