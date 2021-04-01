<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditInfo extends Model
{
    use SoftDeletes;
    protected $table = 'audit_infos';
    protected $guarded = [];
    protected $casts = [
        'number_polis' => 'array',
        'series_polis' => 'array',
        'validity_period_from' => 'array',
        'validity_period_to' => 'array',
        'polis_agent' => 'array',
        'polis_mark' => 'array',
        'specialty' => 'array',
        'workExp' => 'array',
        'polis_model' => 'array',
        'arriving_time' => 'array',
        'cost_of_insurance' => 'array',
        'sum_of_insurance' => 'array',
        'bonus_of_insurance' => 'array'
    ];
}
