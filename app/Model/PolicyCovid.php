<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolicyCovid extends Model
{
    use SoftDeletes;

    /**
     * Name of the columns which should not be fillable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'policy_covids';

    /**
     * Get relation to the policies table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function policy()
    {
        return $this->morphOne(Policy::class, 'model');
    }
}
