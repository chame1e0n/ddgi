<?php

namespace App\Models;

use App\Models\Product\Kasko;
use Illuminate\Database\Eloquent\Model;

class PolicyBeneficiaries extends Model
{
    protected $guarded = [];
    protected $table = 'policy_beneficiaries';

    public function kasko() {
        return $this->belongsToMany(
            Kasko::class,
            'kasko_policy_beneficiaries',
            'policy_beneficiary_id',
            'kasko_id');
    }
}
