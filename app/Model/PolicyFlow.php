<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolicyFlow extends Model
{
    use SoftDeletes;

    public const STATUS_PENDING_TRANSFER = 'pending_transfer';
    public const STATUS_REGISTERED = 'registered';
    public const STATUS_REJECTED_TRANSFER = 'rejected_transfer';
    public const STATUS_RETRANFERRED = 'retransferred';
    public const STATUS_TRANSFERRED = 'transferred';

    /**
     * Policy Flow status names.
     * 
     * @var array
     */
    public static $statuses = [
        self::STATUS_PENDING_TRANSFER => 'отложен',
        self::STATUS_REGISTERED => 'зарегистрирован',
        self::STATUS_REJECTED_TRANSFER => 'отменен',
        self::STATUS_RETRANFERRED => 'повторно передан',
        self::STATUS_TRANSFERRED => 'передан',
    ];

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'policy_flow.act_date' => 'required',
    ];

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'policy_flows';

    /**
     * Name of the columns which should not be fillable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get relation to the branches table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Get relation to the employees table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function from_employee()
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
     * Get relation to the employees table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function to_employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
