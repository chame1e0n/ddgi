<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractLeasingAutocredit extends Model
{
    use SoftDeletes;

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'contract_leasing_autocredit.period_from' => 'required',
        'contract_leasing_autocredit.period_to' => 'required',
        'contract_leasing_autocredit.sum' => ['nullable', 'numeric', 'min:0'],
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
    protected $table = 'contract_leasing_autocredits';

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contract()
    {
        return $this->morphOne(Contract::class, 'model');
    }
}
