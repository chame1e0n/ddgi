<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PretensionOverview extends Model
{
    use SoftDeletes;

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'pretension_overviews';

    /**
     * Get relation to the employees table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Get relation to the pretensions table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pretension()
    {
        return $this->belongsTo(Pretension::class);
    }
}
