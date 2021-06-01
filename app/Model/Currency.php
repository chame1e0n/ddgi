<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'currencies';
}
