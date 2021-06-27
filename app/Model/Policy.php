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
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'policies';

    /**
     * Get relation to the branches table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
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

        if ($this->policy_model) {
            $this->policy_model->delete();
        }

        return parent::delete();
    }
}
