<?php

namespace App\Models;

use App\Models\Spravochniki\Branch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolicyTransfer extends Model
{
    use SoftDeletes;

    protected $guarded=[];

    protected $table = 'policy_transfer';

    public function policies() {
        return $this->belongsToMany(
            Policy::class,
            'policies_policy_transfer',
            'policy_transfer_id',
            'policy_id');
    }

    /**
     * Get the policy series.
     */
    public function branch()
    {
        return $this->hasOne(Branch::class, 'id', 'branch_id');
    }
}
