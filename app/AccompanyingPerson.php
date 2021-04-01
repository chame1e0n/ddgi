<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccompanyingPerson extends Model
{
    use SoftDeletes;
    protected $table = 'accompanying_people';
    protected $guarded = [];
    protected $casts = [
        'fio_accompanying' => 'array',
        'position_accompanying' => 'array'
    ];
}
