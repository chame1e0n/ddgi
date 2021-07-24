<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractSpecialEquipmentPledge extends Model
{
    use SoftDeletes;

    public const FILE_FIRE_CERTIFICATE = 'fire_certificate';
    public const FILE_SECURITY_CERTIFICATE = 'security_certificate';

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'contract_special_equipment_pledge.pledge_agreement_number' => 'required',
        'contract_special_equipment_pledge.pledge_agreement_from' => 'required',
        'contract_special_equipment_pledge.pledge_agreement_to' => 'required',
        'contract_special_equipment_pledge.estimation_basement' => 'required',
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
    protected $table = 'contract_special_equipment_pledges';

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contract()
    {
        return $this->morphOne(Contract::class, 'model');
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
     * Get relation to the properties table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function properties()
    {
        return $this->morphMany(Property::class, 'model');
    }

    /**
     * Get special equipment pledge contract's file of the specified type.
     * 
     * @param string $type Type
     * @return File
     */
    public function getFile($type = 'document')
    {
        return $this->files()->where('type' , '=', $type)->get()->first();
    }
}
