<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceCase extends Model
{
    use SoftDeletes;

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'insurance_cases';

    /**
     * Get relation to the contract_sportsmans table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function contract_sportsmans()
    {
        return $this->belongsToMany(ContractSportsman::class)
                    ->using(ContractSportsmanInsuranceCase::class);
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->contract_sportsmans as /* @var $contract_sportsman ContractSportsman */ $contract_sportsman) {
            $contract_sportsman->pivot->delete();
        }

        return parent::delete();
    }
}
