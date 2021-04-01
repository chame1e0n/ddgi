<?php

namespace App;

use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class CargoInfos extends Model
{
    use SoftDeletes;
    protected $table = 'cargo_infos';
    protected $guarded = [];

    public function policyHolder()
    {
        return $this->hasOne(PolicyHolder::class, 'id', 'policy_holder_id')
            ->with('bank');
    }

    public function policyBeneficiaries()
    {
        return $this->hasOne(PolicyBeneficiaries::class, 'id', 'policy_beneficiary_id');
    }

    public function cargoAccompanyingPerson()
    {
        return $this->hasMany(AccompanyingPerson::class, 'cargo_infos_id', 'id');
    }

    public function cargoPaymentTerms()
    {
        return $this->hasMany(CargoPaymentTerms::class, 'cargo_infos_id', 'id');
    }
}
