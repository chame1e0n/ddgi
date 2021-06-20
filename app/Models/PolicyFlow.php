<?php

namespace App\Models;

use App\Models\Spravochniki\Branch;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PolicyFlow extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    const STATUS_NAME = [
        'registered' => 'Зарегистрирован',
        'pending_transfer' => 'В ожидании распределении',
        'rejected_transfer' => 'Отказано в распределении',
        'transferred' => 'Распределен',
        'retransferred' => 'Перераспределен'
    ];

    public function policies()
    {
        return $this->belongsToMany(
            Policy::class,
            'policies_policy_transfer',
            'policy_transfer_id',
            'policy_id');
    }

    /**
     * Get the policy series.
     */
    public function branch()
    {
        return $this->hasOne(Branch::class, 'id', 'branch_id');
    }

    public function fromUser()
    {
        return $this->hasOne(User::class, 'id', 'from_user_id');
    }

    public function toUser()
    {
        return $this->hasOne(User::class, 'id', 'to_user_id');
    }

    public function files()
    {
        return $this->hasMany(PolicyFlowFile::class);
    }

    public function scopeFilter($q)
    {
        if (request('status')) {
            $q->where('status', request('status'));
        }

        if (request('act_date')) {
            $q->where('act_date', request('act_date'));
        }

        if (request('policy_from')) {
            $q->where('policy_from', request('policy_from_sign'), request('policy_from'));
        }

        if (request('policy_to')) {
            $q->where('policy_to', request('policy_to_sign'), request('policy_to'));
        }

        if (request('from_user_id')) {
            $q->where('from_user_id', request('from_user_id'));
        }

        if (request('to_user_id')) {
            $q->where('to_user_id', request('to_user_id'));
        }

        return $q;
    }

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
            $policy->status = 'registered';
            $policy->date_of_issue = Carbon::now();
            $policy->save();

            PolicyFlow::create([
                'act_date' => $request->act_date,
                'policy_id' => $policy->id,
                'policy_given_by_employee_id' => $createdByUserId,
                'branch_id' => $request->branch_id,
                'status' => 'registered',
            ]);
        }
    }

    static function createPolicyFlow(Request $request, $status, $toUserId)
    {
//        if ($request->hasFile('files')) {
//            foreach ($request->file('files') as $file) {
//                $name = $file->store('document/PolicyFlow', 'public');
//
//                PolicyFlowFile::create([
//                    'name' => $name,
//                    'policy_flow_id' => $newPolicyFlow->id
//                ]);
//            }
//        }
    }

    static function updatePolicyFlow(Request $request, $id, $status)
    {
        $newPolicyFlow = PolicyFlow::find($id)->update([
            'act_number' => $request->act_number,
            'act_date' => $request->act_date,
            'policy_from' => $request->policy_from,
            'policy_to' => $request->policy_to,
            'polis_name' => $request->polis_name,
            'status' => $status,
            'a_reg' => $request->a_reg,
            'price_per_policy' => $request->price_per_policy,
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $name = $file->store('document/PolicyFlow', 'public');

                PolicyFlowFile::create([
                    'name' => $name,
                    'policy_flow_id' => $newPolicyFlow->id
                ]);
            }
        }
    }

    static function updatePolicyFlowStatus($id, $status)
    {
        PolicyFlow::find($id)->update([
            'status' => $status
        ]);
    }
}
