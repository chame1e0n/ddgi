<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes;

    public const MEASURE_M_2 = 'm_2';
    public const MEASURE_SM_2 = 'sm_2';

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'properties';

    /**
     * Get relation to the contract_mortgages table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contract_mortgages()
    {
        return $this->hasMany(ContractMortgage::class);
    }

    /**
     * Get relation to the contract_multilateral_property_pledges table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contract_multilateral_property_pledges()
    {
        return $this->hasMany(ContractMultilateralPropertyPledge::class);
    }

    /**
     * Get relation to the contract_property_leasings table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contract_property_leasings()
    {
        return $this->hasMany(ContractPropertyLeasing::class);
    }

    /**
     * Get relation to the contract_special_equipment_pledges table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contract_special_equipment_pledges()
    {
        return $this->hasMany(ContractSpecialEquipmentPledge::class);
    }

    /**
     * Get relation to the contract_trilateral_property_pledges table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contract_trilateral_property_pledges()
    {
        return $this->hasMany(ContractTrilateralPropertyPledge::class);
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->contract_mortgages as /* @var $contract_mortgage ContractMortgage */ $contract_mortgage) {
            $contract_mortgage->delete();
        }
        foreach($this->contract_multilateral_property_pledges as /* @var $contract_multilateral_property_pledge ContractMultilateralPropertyPledge */ $contract_multilateral_property_pledge) {
            $contract_multilateral_property_pledge->delete();
        }
        foreach($this->contract_property_leasings as /* @var $contract_property_leasing ContractPropertyLeasing */ $contract_property_leasing) {
            $contract_property_leasing->delete();
        }
        foreach($this->contract_special_equipment_pledges as /* @var $contract_special_equipment_pledge ContractSpecialEquipmentPledge */ $contract_special_equipment_pledge) {
            $contract_special_equipment_pledge->delete();
        }
        foreach($this->contract_trilateral_property_pledges as /* @var $contract_trilateral_property_pledge ContractTrilateralPropertyPledge */ $contract_trilateral_property_pledge) {
            $contract_trilateral_property_pledge->delete();
        }

        return parent::delete();
    }
}
