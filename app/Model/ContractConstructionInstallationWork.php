<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

class ContractConstructionInstallationWork extends Model
{
    use SoftDeletes;

    public const FILE_DOCUMENT = 'document';

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
     * Location specificity names.
     * 
     * @var array
     */
    public static $location_specificities = [
        self::LOCATION_SPECIFICITY_BRIDGES_OVERPASSES => 'Мосты, путепроводы',
        self::LOCATION_SPECIFICITY_CAR_PARKS => 'Автопарковки',
        self::LOCATION_SPECIFICITY_DAMS_EMBANKMENTS => 'Дамбы, набережные',
        self::LOCATION_SPECIFICITY_LAND_LINES => 'Наземные линии',
        self::LOCATION_SPECIFICITY_LAND_PATHS => 'Наземные пути',
        self::LOCATION_SPECIFICITY_MOTORWAYS => 'Автомагистрали',
        self::LOCATION_SPECIFICITY_PIPELINES => 'Трубопроводы',
        self::LOCATION_SPECIFICITY_POWER_LINES => 'ЛЭП',
        self::LOCATION_SPECIFICITY_RAILWAYS => 'Железные дороги',
        self::LOCATION_SPECIFICITY_UNDERGROUND_CABLES => 'Подземные кабели',
        self::LOCATION_SPECIFICITY_UNDERGROUND_LINES => 'Подземные линии',
        self::LOCATION_SPECIFICITY_WATERWAYS => 'Водные пути',
    ];

    /**
     * Security schedule names.
     * 
     * @var array
     */
    public static $security_schedules = [
        self::SECURITY_SCHEDULE_AT_DAY => 'днем',
        self::SECURITY_SCHEDULE_AT_NIGHT => 'ночью',
        self::SECURITY_SCHEDULE_AT_WEEKEND => 'выходные дни',
        self::SECURITY_SCHEDULE_FULLTIME => 'круглосуточно',
    ];

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'contract_construction_installation_work.object' => 'required',
        'contract_construction_installation_work.location' => 'required',
        'contract_construction_installation_work.description' => 'required',
        'contract_construction_installation_work.injures' => 'required',
        'contract_construction_installation_work.material_damage' => 'required',
        'contract_construction_installation_work.location_specificity' => 'required',
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
     * Get array representation of the location_specificity attribute.
     * 
     * @param mixed $value
     * @return \Illuminate\Support\Arr
     */
    public function getLocationSpecificityAttribute($value)
    {
        return Arr::wrap(explode(',', $value));
    }

    /**
     * Set string representation of the location_specificity attribute.
     * 
     * @param array $value
     * @return \Illuminate\Support\Arr
     */
    public function setLocationSpecificityAttribute($value)
    {
        return $this->attributes['location_specificity'] = join(',', $value);
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
