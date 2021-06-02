<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractConsumerCredit extends Model
{
    use SoftDeletes;

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'contract_consumer_credits';

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contract()
    {
        return $this->morphOne(Contract::class, 'model');
    }
}
