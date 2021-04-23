<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AllProductsTermsTransh extends Model
{
    use SoftDeletes;
    protected $table = 'all_products_terms_transhes';
    protected $guarded = [];
    protected $casts = [
        'payment_sum' => 'array',
        'payment_from' => 'array',
    ];
}
