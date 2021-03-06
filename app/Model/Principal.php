<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Principal extends Model
{
    use SoftDeletes;

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'principal.bank_id' => ['required', 'integer'],
        'principal.address' => 'required',
        'principal.phone' => 'required',
        'principal.bank_account' => 'required',
        'principal.inn' => 'required',
        'principal.mfo' => 'required',
        'principal.passport_series' => 'required',
        'principal.passport_number' => 'required',
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
    protected $table = 'principals';

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
            $contract->principal_id = null;
            $contract->save();
        }

        return parent::delete();
    }
}
