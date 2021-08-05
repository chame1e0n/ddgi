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
     * Measure names.
     * 
     * @var array
     */
    public static $measures = [
        self::MEASURE_LITER => 'литр',
        self::MEASURE_TON => 'тонна',
        self::MEASURE_UNIT => 'штука',
    ];

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'contract_custom_warehouse.measure' => 'required',
        'contract_custom_warehouse.square' => 'required',
        'contract_custom_warehouse.capacity' => 'required',
        'contract_custom_warehouse.sum' => 'required',
        'contract_custom_warehouse.goods_period_from' => 'required',
        'contract_custom_warehouse.goods_period_to' => 'required',
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
