<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowerSportsman extends Model
{
    protected $fillable = ['policy_holder_id', 'insurance_from', 'insurance_to', 'polis_series',
        'polis_giving_date', 'litso', 'insurance_premium_currency',
        'payment_term', 'all_sum', 'insurance_bonus', 'payment_bonus_sum', 'payment_bonus_from'
    ];
}
