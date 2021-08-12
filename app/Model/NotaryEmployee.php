<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotaryEmployee extends Model
{
    use SoftDeletes;

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'notary_employee.contract_notary_id' => ['required', 'integer'],
        'notary_employee.number' => 'required',
        'notary_employee.administrator' => 'required',
        'notary_employee.composition' => 'required',
        'notary_employee.other' => 'required',
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
    protected $table = 'notary_employees';

    /**
     * Get relation to the contract_notaries table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contract_notary()
    {
        return $this->belongsTo(ContractNotary::class);
    }
}
