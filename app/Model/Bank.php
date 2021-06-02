<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    protected $guarded=[];
}
