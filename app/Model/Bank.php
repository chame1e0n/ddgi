<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
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
    protected $table = 'banks';

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'bank.code' => 'required',
        'bank.name' => 'required',
        'bank.filial' => 'required',
        'bank.address' => 'required',
        'bank.inn' => 'required',
        'bank.account' => 'required',
    ];

    /**
     * Get relation to the beneficiaries table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beneficiaries()
    {
        return $this->hasMany(Beneficiary::class);
    }

    /**
     * Get relation to the borrowers table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function borrowers()
    {
        return $this->hasMany(Borrower::class);
    }

    /**
     * Get relation to the clients table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    /**
     * Get relation to the pledgers table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pledgers()
    {
        return $this->hasMany(Pledger::class);
    }
}
