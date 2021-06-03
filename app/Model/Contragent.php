<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contragent extends Model
{
    use SoftDeletes;

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'contragents';

    /**
     * Get relation to the contract_guarantees table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contract_guarantees()
    {
        return $this->hasMany(ContractGuarantee::class);
    }
}