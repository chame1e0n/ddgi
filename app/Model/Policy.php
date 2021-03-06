<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Policy extends Model
{
    use SoftDeletes;

    public const PRINT_SIZE_A4 = 'a4';
    public const PRINT_SIZE_A5 = 'a5';

    /**
     * Policy print size names.
     * 
     * @var array
     */
    public static $print_sizes = [
        self::PRINT_SIZE_A4 => 'A4',
        self::PRINT_SIZE_A5 => 'A5',
    ];

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'policy.name' => 'required',
        'policy.act_number' => 'required',
        'policy.print_size' => 'required',
        'policy.price' => ['required', 'numeric', 'min:0'],
        'policy.insurance_sum' => ['nullable', 'numeric', 'min:0'],
        'policy.franchise' => ['nullable', 'numeric', 'min:0'],
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['insurance_premium'];

    /**
     * Name of the columns which should not be fillable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'policies';

    /**
     * Get number of policies with specified print size and status.
     * @param string $print_size print size
     * @param string $status     status
     * @return int
     */
    public static function printSizeStatusCount($print_size, $status)
    {
        return self::where('print_size', $print_size)
            ->where('status', $status)
            ->get()
            ->count();
    }

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    /**
     * Get relation to the employees table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Get relation to the policy_flows table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function policy_flows()
    {
        return $this->hasMany(PolicyFlow::class);
    }

    /**
     * Get relation to the pretensions table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pretensions()
    {
        return $this->hasMany(Pretension::class);
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
     * Get relation to the requests table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    /**
     * Get relation to the policy_*s table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function policy_model()
    {
        return $this->morphTo('model');
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
     * Defining insurance premium attribute.
     * 
     * @param null $value Value
     * @return float
     */
    public function getInsurancePremiumAttribute()
    {
        $insurance_premium = 0;
        $contract = $this->contract;

        if ($contract) {
            $policy_insurance_sum = $this->insurance_sum;
            $days = ((strtotime($contract->to) - strtotime($contract->from)) / (60 * 60 * 24)) + 1;

            if (is_null($this->tariff) && is_null($this->premium)) {
                $insurance_premium = ($days * $policy_insurance_sum * $contract->specification->tariff) / 365;
            }
            if ($this->tariff) {
                $insurance_premium = ($days * $policy_insurance_sum * $contract->tariff) / 365;
            }
            if ($this->premium) {
                $insurance_premium = $contract->premium;
            }
        }

        return $insurance_premium;
    }

    /**
     * Get policy contract's files of the specified type.
     * 
     * @param string $type Type
     * @return File
     */
    public function getFiles($type = 'document')
    {
        return $this->files()->where('type' , '=', $type)->get();
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->policy_flows as /* @var $policy_flow PolicyFlow */ $policy_flow) {
            $policy_flow->delete();
        }
        foreach($this->pretensions as /* @var $pretension Pretension */ $pretension) {
            $pretension->delete();
        }
        foreach($this->reinsurances as /* @var $reinsurance Reinsurance */ $reinsurance) {
            $reinsurance->delete();
        }
        foreach($this->requests as /* @var $request Request */ $request) {
            $request->delete();
        }
        foreach($this->files as /* @var $file File */ $file) {
            $file->delete();
        }

        if ($this->policy_model) {
            $this->policy_model->delete();
        }

        return parent::delete();
    }
}
