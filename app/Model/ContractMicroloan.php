<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractMicroloan extends Model
{
    use SoftDeletes;

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'contract_microloan.credit_agreement_date' => 'required',
        'contract_microloan.microloan_from' => 'required',
        'contract_microloan.microloan_to' => 'required',
        'contract_microloan.microloan_sum' => ['required', 'numeric', 'min:0'],
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
    protected $table = 'contract_microloans';

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contract()
    {
        return $this->morphOne(Contract::class, 'model');
    }
}
