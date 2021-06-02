<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reinsurance extends Model
{
    use SoftDeletes;

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'reinsurances';

    /**
     * Get relation to the employees table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Get relation to the policies table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function policy()
    {
        return $this->belongsTo(Policy::class);
    }

    /**
     * Get relation to the reinsurance_overviews table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reinsurance_overviews()
    {
        return $this->hasMany(ReinsuranceOverview::class);
    }
}
