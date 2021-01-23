<?php

namespace App\Models;

use App\Models\Spravochniki\Bank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $guarded=[];

    public function scopeIndividual($query)
    {
        return $query->where('type', 0);
    }

    public function scopeLegal($query)
    {
        return $query->where('type', 1);
    }

    /**
     * Get the bank.
     */
    public function bank()
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }
}
