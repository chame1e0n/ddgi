<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractConstructionInstallationWork extends Model
{
    use SoftDeletes;

    public const LOCATION_SPECIFICITY_BRIDGES_OVERPASSES = 'bridges_overpasses';
    public const LOCATION_SPECIFICITY_CAR_PARKS = 'car_parks';
    public const LOCATION_SPECIFICITY_DAMS_EMBANKMENTS = 'dams_embankments';
    public const LOCATION_SPECIFICITY_LAND_LINES = 'land_lines';
    public const LOCATION_SPECIFICITY_LAND_PATHS = 'land_paths';
    public const LOCATION_SPECIFICITY_MOTORWAYS = 'motorways';
    public const LOCATION_SPECIFICITY_PIPELINES = 'pipelines';
    public const LOCATION_SPECIFICITY_POWER_LINES = 'power_lines';
    public const LOCATION_SPECIFICITY_RAILWAYS = 'railways';
    public const LOCATION_SPECIFICITY_UNDERGROUND_CABLES = 'underground_cables';
    public const LOCATION_SPECIFICITY_UNDERGROUND_LINES = 'underground_lines';
    public const LOCATION_SPECIFICITY_WATERWAYS = 'waterways';

    public const SECURITY_SCHEDULE_AT_DAY = 'at_day';
    public const SECURITY_SCHEDULE_AT_NIGHT = 'at_night';
    public const SECURITY_SCHEDULE_AT_WEEKEND = 'at_weekend';
    public const SECURITY_SCHEDULE_FULLTIME = 'fulltime';

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'contract_construction_installation_works';

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contract()
    {
        return $this->morphOne(Contract::class, 'model');
    }
}
