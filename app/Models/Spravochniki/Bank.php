<?php

namespace App\Models\Spravochniki;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{
    use SoftDeletes;

    protected $guarded=[];
}
