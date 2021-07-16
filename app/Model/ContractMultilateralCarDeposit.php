<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractMultilateralCarDeposit extends Model
{
    use SoftDeletes;

    public const FILE_OVERVIEW_PHOTO = 'overview_photo';

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'contract_multilateral_car_deposit.insurance_agreement_number' => 'required',
        'contract_multilateral_car_deposit.insurance_agreement_date' => 'required',
        'contract_multilateral_car_deposit.credit_agreement_number' => 'required',
        'contract_multilateral_car_deposit.credit_period_from' => 'required',
        'contract_multilateral_car_deposit.credit_period_to' => 'required',
        'contract_multilateral_car_deposit.geo_zone' => 'required',
        'contract_multilateral_car_deposit.purpose' => 'required',
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
    protected $table = 'contract_multilateral_car_deposits';

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
     * Get multilateral car deposit contract's file of the specified type.
     * 
     * @param string $type Type
     * @return File
     */
    public function getFile($type = 'document')
    {
        return $this->files()->where('type' , '=', $type)->get()->first();
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->files as /* @var $file File */ $file) {
            $file->delete();
        }

        return parent::delete();
    }
}
