<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
     * Create new policies in policies table and register them in policy_flows table
     * @param Request $request
     */
    static function createNewPoliciesAndPolicyFlows(Request $request)
    {
        $createdByUserId = Auth::user()->employees->first()->id;

        for ($i = $request->policy_from; $i <= $request->policy_to; $i++) {
            $policy = new Policy;
            $policy->series = $i;
            $policy->act_number = $request->act_number;
            $policy->print_size = $request->a_reg;
            $policy->name = $request->polis_name;
            $policy->price = $request->price_per_policy;
            $policy->employee_id = $createdByUserId;
            $policy->status = self::STATUS_REGISTERED;
            $policy->date_of_issue = Carbon::now();
            $policy->save();

            PolicyFlow::create([
                'act_date' => $request->act_date,
                'policy_id' => $policy->id,
                'policy_given_by_employee_id' => $createdByUserId,
                'branch_id' => $request->branch_id,
                'status' => self::STATUS_REGISTERED,
            ]);
        }
    }
}
