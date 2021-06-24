<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use SoftDeletes;


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
    protected $table = 'currencies';

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'currency.code' => 'required',
        'currency.name' => 'required',
        'currency.priority' => 'required',
    ];

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    /**
     * Get all currencies ordered by priority.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getOrderedCurrencies()
    {
        return self::orderBy('priority', 'asc')->get();
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->contracts as /* @var $contract Contract */ $contract) {
            $contract->currency_id = null;
            $contract->save();
        }

        return parent::delete();
    }
}
