<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReinsuranceOverview extends Model
{
    use SoftDeletes;

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'reinsurance_overviews';

    /**
     * Get relation to the employees table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Get relation to the reinsurances table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reinsurance()
    {
        return $this->belongsTo(Reinsurance::class);
    }
}
