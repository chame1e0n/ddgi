<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractSportsman extends Model
{
    use SoftDeletes;

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'contract_sportsmans';

    /**
     * Get relation to the insurance_cases table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function insurance_cases()
    {
        return $this->belongsToMany(InsuranceCase::class)
                    ->using(ContractSportsmanInsuranceCase::class);
    }

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contract()
    {
        return $this->morphOne(Contract::class, 'model');
    }
}
