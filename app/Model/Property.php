<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes;

    public const MEASURE_M_2 = 'm_2';
    public const MEASURE_SM_2 = 'sm_2';

    public static $measures = [
        self::MEASURE_M_2 => 'м²',
        self::MEASURE_SM_2 => 'см²',
    ];

    /**
     * Name of the columns which should not be fillable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'properties';

    /**
     * Get relation to the tables, containing the property:
     *  contract_mortgages
     *  contract_multilateral_property_pledges
     *  contract_property_leasings
     *  contract_special_equipment_pledges
     *  contract_trilateral_property_pledges.
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function contract_model()
    {
        return $this->morphTo('model');
    }
}
