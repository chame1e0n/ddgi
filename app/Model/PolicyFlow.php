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
     * Get relation to the employees table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function policy_given_by_employee()
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

    /**
     * Get relation to the policy_flow_files table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function policy_flow_files()
    {
        return $this->hasMany(PolicyFlowFile::class);
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->policy_flow_files as /* @var $policy_flow_file PolicyFlowFile */ $policy_flow_file) {
            $policy_flow_file->delete();
        }

        return parent::delete();
    }
}
