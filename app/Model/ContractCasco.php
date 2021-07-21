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
     * Usage basement names.
     * 
     * @var array
     */
    public static $usage_basements = [
        self::USAGE_BASEMENT_LEASING => 'договор аренды',
        self::USAGE_BASEMENT_PROXY => 'доверенность',
        self::USAGE_BASEMENT_TECHPASSPORT => 'тех. паспорт',
        self::USAGE_BASEMENT_WAYBILL => 'путевой лист',
    ];

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'contract_casco.usage_basement' => 'required',
        'contract_casco.geo_zone' => 'required',
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
