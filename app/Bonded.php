<?php

namespace App;

use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bonded extends Model
{
    use SoftDeletes;
    protected $table = 'bonded';
    protected $guarded = [];

    public function product() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function policyHolder() {
        return $this->hasOne(PolicyHolder::class, 'id', 'policy_holder_id');
    }

    public function policyBeneficiaries() {
        return $this->hasOne(PolicyBeneficiaries::class, 'id', 'policy_beneficiary_id');
    }

    public function policyInformations() {
        return $this->belongsTo(BondedPolicyInformation::class, 'id', 'bonded_id');
    }
}
