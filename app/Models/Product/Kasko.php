<?php

namespace App\Models\Product;

use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\PolicyInformation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kasko extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'kasko';

    public function policyHolders() {
        return $this->belongsToMany(
            PolicyHolder::class,
            'kasko_policy_holders',
            'kasko_id',
            'policy_holders_id');
    }

    public function policyBeneficiaries() {
        return $this->belongsToMany(
            PolicyBeneficiaries::class,
            'kasko_policy_beneficiaries',
            'kasko_id',
            'policy_beneficiary_id');
    }

    public function policyInformations() {
        return $this->hasMany( PolicyInformation::class, 'kasko_id', 'id' );
    }
}
