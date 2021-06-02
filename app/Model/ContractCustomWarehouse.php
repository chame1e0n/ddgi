<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractCustomWarehouse extends Model
{
    use SoftDeletes;

    public const MEASURE_LITER = 'liter';
    public const MEASURE_TON = 'ton';
    public const MEASURE_UNIT = 'unit';

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'contract_custom_warehouses';

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contract()
    {
        return $this->morphOne(Contract::class, 'model');
    }
}
