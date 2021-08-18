<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use SoftDeletes;

    public const PAYMENT_TYPE_ENTIRELY = 'entirely';
    public const PAYMENT_TYPE_TRANCHE = 'tranche';

    public const TYPE_INDIVIDUAL = 'individual';
    public const TYPE_LEGAL = 'legal';

    public const FILE_TYPE_QUESTIONARY = 'questionary';
    public const FILE_TYPE_AGREEMENT = 'agreement';
    public const FILE_TYPE_POLICY = 'policy';

    /**
     * Payment type names.
     * 
     * @var array
     */
    public static $payment_types = [
        self::PAYMENT_TYPE_ENTIRELY => 'единовременно',
        self::PAYMENT_TYPE_TRANCHE => 'транш',
    ];

    /**
     * Type names.
     * 
     * @var array
     */
    public static $types = [
        self::TYPE_INDIVIDUAL => 'физическое лицо',
        self::TYPE_LEGAL => 'юридическое лицо',
    ];

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'contract.specification_id' => ['required', 'integer'],
        'contract.type' => 'required',
        'contract.tariff' => ['nullable', 'numeric', 'between:0,99.99'],
        'contract.premium' => ['nullable', 'numeric', 'min:0'],
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
    protected $table = 'contracts';

    /**
     * Defining default attributes values.
     * @param array $attributes Attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $this->payment_type = Contract::PAYMENT_TYPE_ENTIRELY;

        parent::__construct($attributes);
    }

    /**
     * Get relation to the beneficiaries table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }

    /**
     * Get relation to the borrowers table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function borrower()
    {
        return $this->belongsTo(Borrower::class);
    }

    /**
     * Get relation to the clients table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get relation to the currencies table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Get relation to the customers table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get relation to the guarantors table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guarantor()
    {
        return $this->belongsTo(Guarantor::class);
    }

    /**
     * Get relation to the insured_persons table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function insured_person()
    {
        return $this->belongsTo(InsuredPerson::class);
    }

    /**
     * Get relation to the payment_methods table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /**
     * Get relation to the pledgers table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pledger()
    {
        return $this->belongsTo(Pledger::class);
    }

    /**
     * Get relation to the principals table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function principal()
    {
        return $this->belongsTo(Principal::class);
    }

    /**
     * Get relation to the specifications table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specification()
    {
        return $this->belongsTo(Specification::class);
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
     * Get relation to the tranches table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tranches()
    {
        return $this->hasMany(Tranche::class);
    }

    /**
     * Get relation to the files table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function files()
    {
        return $this->morphMany(File::class, 'model');
    }

    /**
     * Get relation to the contract_*s table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function contract_model()
    {
        return $this->morphTo('model');
    }

    /**
     * Get names of all contract policies.
     * 
     * @return array
     */
    public function getPolicyNames()
    {
        return array_unique($this->policies->pluck('name')->all());
    }

    /**
     * Get series of all contract policies.
     * 
     * @return array
     */
    public function getPolicySeries()
    {
        return array_unique($this->policies->pluck('series')->all());
    }

    /**
     * Get all full names of all agents of the contract.
     * 
     * @return array
     */
    public function getEmployeeFullNames()
    {
        $employees = Employee::select('employees.*')
            ->crossJoin('policy_flows', 'employees.id', '=', 'policy_flows.to_employee_id')
            ->crossJoin('policies', 'policy_flows.policy_id', '=', 'policies.id')
            ->where('policies.contract_id', '=', $this->id)
            ->whereNull(['policy_flows.deleted_at', 'policies.deleted_at'])
            ->get();

        $full_names = [];
        foreach($employees as /* @var $employee Employee */ $employee) {
            $full_names[] = $employee->getFullName();
        }

        return array_unique($full_names);
    }

    /**
     * Get contract's file of the specified type.
     * 
     * @param string $type Type
     * @return File
     */
    public function getFile($type = 'document')
    {
        return $this->files()->where('type' , '=', $type)->get()->first();
    }

    /**
     * Generate contract number.
     */
    public function generateNumber()
    {
        if (empty($this->number)) {
            $branch = $this->policies->first()->policy_flows->first()->to_employee->branch;
            $region = $branch->region;
            $specification = $this->specification;
            $type = $specification->type;
            $payment_method = $this->payment_method;

            $contract_number = Contract::select('contracts.*')
                ->join('policies', 'contracts.id', '=', 'policies.contract_id')
                ->join('policy_flows', 'policies.id', '=', 'policy_flows.policy_id')
                ->join('employees', 'policy_flows.to_employee_id', '=', 'employees.id')
                ->where('contracts.specification_id', '=', $specification->id)
                ->where('employees.branch_id', '=', $branch->id)
                ->whereNull(['policies.deleted_at', 'policy_flows.deleted_at', 'employees.deleted_at'])
                ->count();

            $this->number = substr($region->code, -2) . substr($branch->code, -2) . '/' .
                            substr($type->code, -2) . substr($specification->code, -2) . '/' .
                            substr($payment_method->code, -2) . '/' .
                            date('y', $this->created_at->timestamp) . sprintf('%05d', $contract_number - 1);

            $this->save();
        }
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->policies as /* @var $policy Policy */ $policy) {
            $policy->contract_id = null;
            $policy->save();
        }
        foreach($this->tranches as /* @var $tranche Tranche */ $tranche) {
            $tranche->delete();
        }
        foreach($this->files as /* @var $file File */ $file) {
            $file->delete();
        }

        if ($this->contract_model) {
            $this->contract_model->delete();
        }

        return parent::delete();
    }
}
