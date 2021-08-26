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
     * Employee's roles.
     * 
     * @var array
     */
    public static $roles = [
        self::ROLE_ADMIN => 'администратор',
        self::ROLE_AGENT => 'агент',
        self::ROLE_DIRECTOR => 'директор',
        self::ROLE_MANAGER => 'менеджер',
    ];

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
        'employee.branch_id' => ['required', 'integer'],
        'employee.name' => 'required',
        'employee.surname' => 'required',
        'employee.middlename' => 'required',
        'employee.birthdate' => 'required',
        'employee.passport_number' => 'required',
        'employee.passport_series' => 'required',
        'employee.phone' => 'required',
        'employee.address' => 'required',
    ];

    /**
     * Get relation to the agent_infos table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent_info()
    {
        return $this->belongsTo(AgentInfo::class);
    }

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

    /**
     * Get title of the role in the specified form.
     * @param string $role        Role
     * @param bool   $plural_form Form
     * @return string
     */
    public static function getTitle($role, $plural_form = false)
    {
        $title = self::$roles[$role];
        $first_char = mb_substr($title, 0, 1);
        $last_chars = mb_substr($title, 1, null);

        return mb_strtoupper($first_char) . $last_chars . ($plural_form ? 'ы' : '');
    }

    /**
     * Get full name of employee.
     * 
     * @return string
     */
    public function getFullName() {
        return $this->surname . ' ' . $this->name . ' ' . $this->middlename;
    }

    /**
     * Get full name of employee and his position in the branch.
     * 
     * @return string
     */
    public function getFullNameAndPosition() {
        return $this->surname . ' ' . $this->name . ' ' . $this->middlename . ' - ' . self::$roles[$this->role];
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->branches_via_director as /* @var $branch Branch */ $branch) {
            $branch->director_id = null;
            $branch->save();
        }
        foreach($this->policies as /* @var $policy Policy */ $policy) {
            $policy->delete();
        }
        foreach($this->policy_flows_via_from_employee as /* @var $policy_flow PolicyFlow */ $policy_flow) {
            $policy_flow->delete();
        }
        foreach($this->policy_flows_via_policy_given_by_employee as /* @var $policy_flow PolicyFlow */ $policy_flow) {
            $policy_flow->delete();
        }
        foreach($this->policy_flows_via_to_employee as /* @var $policy_flow PolicyFlow */ $policy_flow) {
            $policy_flow->delete();
        }
        foreach($this->pretension_overviews as /* @var $pretension_overview PretensionOverview */ $pretension_overview) {
            $pretension_overview->delete();
        }
        foreach($this->reinsurances as /* @var $reinsurance Reinsurance */ $reinsurance) {
            $reinsurance->delete();
        }
        foreach($this->reinsurance_overviews as /* @var $reinsurance_overview ReinsuranceOverview */ $reinsurance_overview) {
            $reinsurance_overview->delete();
        }
        foreach($this->requests as /* @var $request Request */ $request) {
            $request->delete();
        }
        foreach($this->request_overviews as /* @var $request_overview RequestOverview */ $request_overview) {
            $request_overview->delete();
        }

        return parent::delete();
    }
}
