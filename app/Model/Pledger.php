<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pledger extends Model
{
    use SoftDeletes;

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'pledgers';

    /**
     * Get relation to the banks table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->contracts as /* @var $contract Contract */ $contract) {
            $contract->pledger_id = null;
            $contract->save();
        }

        return parent::delete();
    }
}
