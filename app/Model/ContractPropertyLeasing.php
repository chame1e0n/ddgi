<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractPropertyLeasing extends Model
{
    use SoftDeletes;

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'contract_property_leasings';

    /**
     * Get relation to the properties table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
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
