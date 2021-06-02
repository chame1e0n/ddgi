<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractCasco extends Model
{
    use SoftDeletes;

    public const USAGE_BASEMENT_LEASING = 'leasing';
    public const USAGE_BASEMENT_PROXY = 'proxy';
    public const USAGE_BASEMENT_TECHPASSPORT = 'techpassport';
    public const USAGE_BASEMENT_WAYBILL = 'waybill';

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'contract_cascos';

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contract()
    {
        return $this->morphOne(Contract::class, 'model');
    }
}
