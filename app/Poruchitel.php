<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Poruchitel extends Model
{
    use SoftDeletes;
    protected $table = 'poruchitels';
    protected $guarded = [];
}