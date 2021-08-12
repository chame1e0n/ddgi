<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolicyNotary extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'policy_notaries';

    /**
     * Get relation to the policies table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function policy()
    {
        return $this->morphOne(Policy::class, 'model');
    }
}
