<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractCreditLeasingRepayment extends Model
{
    use SoftDeletes;

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'contract_credit_leasing_repayment.loan_agreement' => 'required',
        'contract_credit_leasing_repayment.period_from' => 'required',
        'contract_credit_leasing_repayment.period_to' => 'required',
        'contract_credit_leasing_repayment.sum' => ['required', 'numeric', 'min:0'],
        'contract_credit_leasing_repayment.purpose' => 'required',
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
    protected $table = 'contract_credit_leasing_repayments';

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contract()
    {
        return $this->morphOne(Contract::class, 'model');
    }
}
