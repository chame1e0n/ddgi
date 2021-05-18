<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AllProductFollower extends Model
{
    use SoftDeletes;
    protected $table = 'all_product_followers';
    protected $guarded = [];
    protected $casts = [
        'name' => 'array',
        'position' => 'array',
    ];
}
