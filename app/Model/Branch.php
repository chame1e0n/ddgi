<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'branches';
}
