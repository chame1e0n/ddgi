<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractExportCargo extends Model
{
    use SoftDeletes;

    public const AGREEMENT_GOODS_TYPE_ORDER = 'order';
    public const AGREEMENT_GOODS_TYPE_STANDARD = 'standard';

    public const WAITING_PERIOD_180 = '180';
    public const WAITING_PERIOD_30 = '30';
    public const WAITING_PERIOD_100 = '300';

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'contract_export_cargos';

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contract()
    {
        return $this->morphOne(Contract::class, 'model');
    }
}
