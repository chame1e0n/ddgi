<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractPropertyLeasing extends Model
{
    use SoftDeletes;

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'contract_property_leasing.geo_zone' => 'required',
        'contract_property_leasing.insured_sum_for_closed_warehouse' => ['nullable', 'numeric', 'min:0'],
        'contract_property_leasing.insured_sum_for_opened_warehouse' => ['nullable', 'numeric', 'min:0'],
        'contract_property_leasing.franchise_earthquake_fire_percent' => ['required', 'numeric', 'between:0,99.99'],
        'contract_property_leasing.franchise_illegal_action_percent' => ['required', 'numeric', 'between:0,99.99'],
        'contract_property_leasing.franchise_other_risks_percent' => ['required', 'numeric', 'between:0,99.99'],
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
    protected $table = 'contract_property_leasings';

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contract()
    {
        return $this->morphOne(Contract::class, 'model');
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
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->properties as /* @var $property Property */ $property) {
            $property->delete();
        }

        return parent::delete();
    }
}
