<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CargoPaymentTerms extends Model
{
    use SoftDeletes;
    protected $table = 'cargo_payment_terms';
    protected $guarded = [];
    protected $casts = [
        'payment_sum' => 'array',
        'payment_from' => 'array'
    ];
}
