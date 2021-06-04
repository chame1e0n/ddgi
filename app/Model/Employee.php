<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    public const ROLE_ADMIN = 'admin';
    public const ROLE_AGENT = 'agent';
    public const ROLE_DIRECTOR = 'director';
    public const ROLE_MANAGER = 'manager';

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
    protected $table = 'employees';

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'employee.branch_id' => 'required',
        'employee.name' => 'required',
        'employee.surname' => 'required',
        'employee.middlename' => 'required',
        'employee.birthdate' => 'required',
        'employee.passport_number' => 'required',
        'employee.passport_series' => 'required',
        'employee.work_start_date' => 'required',
        'employee.work_end_date' => 'required',
        'employee.phone' => 'required',
        'employee.address' => 'required',
    ];

    /**
     * Get relation to the branches table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Get relation to the users table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    /**
     * Get relation to the branches table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branches_via_director()
    {
        return $this->hasMany(Branch::class, 'director_id');
    }

    /**
     * Get relation to the policies table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function policies()
    {
        return $this->hasMany(Policy::class);
    }

    /**
     * Get relation to the policy_flows table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function policy_flows_via_from_employee()
    {
        return $this->hasMany(PolicyFlow::class, 'from_employee_id');
    }

    /**
     * Get relation to the policy_flows table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function policy_flows_via_policy_given_by_employee()
    {
        return $this->hasMany(PolicyFlow::class, 'policy_given_by_employee_id');
    }

    /**
     * Get relation to the policy_flows table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function policy_flows_via_to_employee()
    {
        return $this->hasMany(PolicyFlow::class, 'to_employee_id');
    }

    /**
     * Get relation to the pretension_overviews table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pretension_overviews()
    {
        return $this->hasMany(PretensionOverview::class);
    }

    /**
     * Get relation to the reinsurances table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reinsurances()
    {
        return $this->hasMany(Reinsurance::class);
    }

    /**
     * Get relation to the reinsurance_overviews table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reinsurance_overviews()
    {
        return $this->hasMany(ReinsuranceOverview::class);
    }

    /**
     * Get relation to the requests table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requests()
    {
        return $this->hasMany(Request::class);
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
