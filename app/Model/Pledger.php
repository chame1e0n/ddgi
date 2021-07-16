<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pledger extends Model
{
    use SoftDeletes;

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'pledger.bank_id' => ['required', 'integer'],
        'pledger.fio' => 'required',
        'pledger.address' => 'required',
        'pledger.phone' => 'required',
        'pledger.bank_account' => 'required',
        'pledger.inn' => 'required',
        'pledger.mfo' => 'required',
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
