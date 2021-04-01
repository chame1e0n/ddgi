<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowerSportsmanInfo extends Model
{
    protected $fillable = ['borrower_sportsman_id', 'policy_num', 'policy_series', 'policy_chronic', 'policy_agent',
        'polis_fio', 'polis_date_birth', 'polis_passport_series', 'polis_usable_period',
        'polis_benefit', 'polis_overall_sum', 'polis_bonus',
    ];
}
