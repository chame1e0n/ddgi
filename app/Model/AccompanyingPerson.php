<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccompanyingPerson extends Model
{
    use SoftDeletes;

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'accompanying_persons';

    /**
     * Get relation to the contract_cargos table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contract_cargo()
    {
        return $this->belongsTo(ContractCargo::class);
    }
}
