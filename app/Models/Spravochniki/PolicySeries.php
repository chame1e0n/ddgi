<?php

namespace App\Models\Spravochniki;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolicySeries extends Model
{
    use SoftDeletes;

    protected $guarded=[];
}
