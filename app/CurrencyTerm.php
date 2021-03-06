<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrencyTerm extends Model
{
    use SoftDeletes;
    protected $table = 'currency_terms';
    protected $guarded = [];
    protected $casts = [
        'payment_sum' => 'array',
        'payment_from' => 'array'
    ];
}
