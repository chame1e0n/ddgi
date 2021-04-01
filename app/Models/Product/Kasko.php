<?php

namespace App\Models\Product;

use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\PolicyInformation;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kasko extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'kasko';



    public function product() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function KascoStrahPremiya()
    {
        return $this->hasMany(KascoStrahPremiya::class);
    }
    public function policyHolders()
    {
        return $this->belongsTo(PolicyHolder::class, 'policy_holder_id');
    }

    public function policyInformations() {
        return $this->hasMany( PolicyInformation::class, 'kasko_id', 'id' );
    }
}
