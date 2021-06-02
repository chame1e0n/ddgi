<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotaryEmployee extends Model
{
    use SoftDeletes;

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
