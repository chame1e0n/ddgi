<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AllProductInformationTransport extends Model
{
    use SoftDeletes;
    protected $table = 'all_product_information_transports';
    protected $guarded = [];
    protected $casts = [
        'polis_mark' => 'array',
        'polis_model' => 'array',
        'polis_gos_num' => 'array',
        'polis_teh_passport' => 'array',
        'polis_num_engine' => 'array',
        'agents' => 'array',
        'polis_payload' => 'array',
        'modification' => 'array',
        'state_num' => 'array',
        'num_tech_passport'=>'array',
        'num_engine'=>'array',
        'num_carcase'=>'array',
        'carrying_capacity'=>'array',
        'insurance_cost'=>'array',
        'overall_polis_sum'=>'array',
        'polis_premium'=>'array',
    ];
}
