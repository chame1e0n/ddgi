<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'customer.bank_id' => ['required', 'integer'],
        'customer.activity_field' => 'required',
        'customer.address' => 'required',
        'customer.post' => 'required',
        'customer.phone' => 'required',
        'customer.bank_account' => 'required',
        'customer.inn' => 'required',
        'customer.mfo' => 'required',
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
    protected $table = 'customers';

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
            $contract->customer_id = null;
            $contract->save();
        }

        return parent::delete();
    }
}
