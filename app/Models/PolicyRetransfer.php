<?php

namespace App\Models;

use App\Models\Spravochniki\Branch;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolicyRetransfer extends Model
{
    use SoftDeletes;

    protected $guarded=[];

    protected $table = 'policy_retransfer';

    public function policies() {
        return $this->belongsToMany(
            Policy::class,
            'policies_policy_retransfer',
            'policy_retransfer_id',
            'policy_id');
    }

    /**
     * Get the policy series.
     */
    public function branch()
    {
        return $this->hasOne(Branch::class, 'id', 'branch_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}