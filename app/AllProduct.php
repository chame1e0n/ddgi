<?php

namespace App;

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
    public function currencyTerms()
    {
        return $this->hasMany(MejdCurrencyTermsTransh::class, 'all_products_id', 'id');
    }
    public function allProductInfo()
    {
        return $this->hasOne(AllProductInformation::class, 'all_products_id', 'id');
    }
}



