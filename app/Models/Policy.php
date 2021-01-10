<?php

namespace App\Models;

use App\Models\Spravochniki\PolicySeries;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Policy extends Model
{
    use SoftDeletes;

    protected $guarded=[];

    /**
     * Get the policy series.
     */
    public function policySeries()
    {
        return $this->hasOne(PolicySeries::class, 'id', 'policy_series_id');
    }
}
