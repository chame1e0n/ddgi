<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolicyConstructionInstallationWork extends Model
{
    use SoftDeletes;

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'policy_construction_installation_work.construction_installation_price' => 'required',
        'policy_construction_installation_work.construction_price' => 'required',
        'policy_construction_installation_work.equipment_price' => 'required',
        'policy_construction_installation_work.machine_price' => 'required',
        'policy_construction_installation_work.clear_location_price' => 'required',
        'policy_construction_installation_work.insurance_value' => 'required',
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
    protected $table = 'policy_construction_installation_works';

    /**
     * Get relation to the policies table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function policy()
    {
        return $this->morphOne(Policy::class, 'model');
    }
}
