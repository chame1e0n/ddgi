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
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'contract_construction_installation_work.object' => 'object',
        'contract_construction_installation_work.location' => 'location',
        'contract_construction_installation_work.location' => 'description',
        'contract_construction_installation_work.location' => 'injures',
        'contract_construction_installation_work.location' => 'material_damage',
        'contract_construction_installation_work.location' => 'location_specificity',
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
    protected $table = 'contract_construction_installation_works';

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contract()
    {
        return $this->morphOne(Contract::class, 'model');
    }

    /**
     * Get relation to the construction_participants table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function construction_participants()
    {
        return $this->hasMany(ConstructionParticipant::class);
    }

    /**
     * Get relation to the files table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function files()
    {
        return $this->morphMany(File::class, 'model');
    }

    /**
     * Get construction installation work contract's files of the specified type.
     * 
     * @param string $type Type
     * @return File
     */
    public function getFiles($type = 'document')
    {
        return $this->files()->where('type' , '=', $type)->get();
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->construction_participants as /* @var $construction_participant ConstructionParticipant */ $construction_participant) {
            $construction_participant->delete();
        }
        foreach($this->files as /* @var $file File */ $file) {
            $file->delete();
        }

        return parent::delete();
    }
}
