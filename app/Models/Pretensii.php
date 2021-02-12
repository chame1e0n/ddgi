<?php

namespace App\Models;

use App\Models\Spravochniki\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pretensii extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'pretensii';

    /**
     * Get the status.
     */
    public function status()
    {
        return $this->hasOne(PretensiiStatus::class, 'id', 'pretensii_status_id');
    }

    public function branch()
    {
        return $this->hasOne(Branch::class, 'id', 'branch_id');
    }

    public function franchise_type()
    {
        return $this->hasOne(Branch::class, 'id', 'franchise_type_id');
    }

    public function overview(){
        return $this->hasMany( PretensiiOverview::class, 'pretensii_id', 'id' );
    }

    /**
     * Get the policy series.
     */
    public function policy()
    {
        return $this->hasOne(Policy::class, 'id', 'policy_id');
    }
}
