<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractInstallment extends Model
{
    use SoftDeletes;

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'contract_installment.sum' => ['nullable', 'numeric', 'min:0'],
        'contract_installment.loss_sum' => ['nullable', 'numeric', 'min:0'],
        'contract_installment.loss_tariff' => ['nullable', 'numeric', 'min:0'],
        'contract_installment.loss_premium' => ['nullable', 'numeric', 'min:0'],
        'contract_installment.loss_franchise' => ['nullable', 'numeric', 'min:0'],
        'contract_installment.risk_sum' => ['nullable', 'numeric', 'min:0'],
        'contract_installment.risk_tariff' => ['nullable', 'numeric', 'min:0'],
        'contract_installment.risk_premium' => ['nullable', 'numeric', 'min:0'],
        'contract_installment.risk_franchise' => ['nullable', 'numeric', 'min:0'],
        'contract_installment.franchise_earthquake_fire_percent' => ['required', 'numeric', 'between:0,99.99'],
        'contract_installment.franchise_illegal_action_percent' => ['required', 'numeric', 'between:0,99.99'],
        'contract_installment.franchise_other_risks_percent' => ['required', 'numeric', 'between:0,99.99'],
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
    protected $table = 'contract_installments';

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contract()
    {
        return $this->morphOne(Contract::class, 'model');
    }
}
