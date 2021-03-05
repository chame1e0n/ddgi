<?php

namespace App;

use App\Models\Policy;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BondedPolicyInformation extends Model
{
    use SoftDeletes;

    protected $table = 'bonded_policy_informations';
    protected $guarded = [];

    public function policy() {
        return $this->hasOne(Policy::class, 'id', 'policy_id');
    }

    public function agent() {
        return $this->hasOne(Agent::class, 'user_id', 'user_id');
    }

    public function policySeries() {
        return $this->hasOne(PolicySeries::class, 'id', 'policy_series_id');
    }
}
