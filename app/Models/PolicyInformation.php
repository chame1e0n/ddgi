<?php

namespace App\Models;

use App\Models\Product\Kasko;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Database\Eloquent\Model;

class PolicyInformation extends Model
{
    protected $guarded = [];
    protected $table = 'kasko_policy_informations';

    public function kasko() {
        return $this->hasOne(Kasko::class, 'id', 'kasko_id');
    }

    public function policy()
    {
        return $this->hasOne(Policy::class, 'id', 'policy_id');
    }

    public function policySeries()
    {
        return $this->hasOne(PolicySeries::class, 'id', 'policy_series_id');
    }
}
