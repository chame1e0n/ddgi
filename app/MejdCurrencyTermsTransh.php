<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MejdCurrencyTermsTransh extends Model
{
    use SoftDeletes;
    protected $table = 'mejd_currency_terms_transhes';
    protected $guarded = [];
    protected $casts = [
        'payment_sum' => 'array',
        'payment_from' => 'array',
    ];
}



