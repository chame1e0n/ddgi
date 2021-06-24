<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractCargo extends Model
{
    use SoftDeletes;

    public const INSURANCE_CONDITIONS_ALL_RISKS = 'all_risks';
    public const INSURANCE_CONDITIONS_NO = 'no';
    public const INSURANCE_CONDITIONS_ONLY_CRASH = 'only_crash';
    public const INSURANCE_CONDITIONS_PRIVATE_ACCIDENT = 'private_accident';

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'contract_cargos';

    /**
     * Get relation to the accompanying_persons table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accompanying_persons()
    {
        return $this->hasMany(AccompanyingPerson::class);
    }

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contract()
    {
        return $this->morphOne(Contract::class, 'model');
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->accompanying_persons as /* @var $accompanying_person AccompanyingPerson */ $accompanying_person) {
            $accompanying_person->delete();
        }

        return parent::delete();
    }
}
