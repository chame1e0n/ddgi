<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use SoftDeletes;

    public const STATUS_CANCELLING = 'cancelling';
    public const STATUS_DEFECTIVE = 'defective';
    public const STATUS_LOST = 'lost';
    public const STATUS_POLICY_TRANSFER = 'policy_transfer';
    public const STATUS_TERMINATED = 'terminated';
    public const STATUS_UNDERWRITTING = 'underwritting';

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'requests';

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
     * Get relation to the request_overviews table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function request_overviews()
    {
        return $this->hasMany(RequestOverview::class);
    }
}
