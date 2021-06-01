<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'properties';
}
