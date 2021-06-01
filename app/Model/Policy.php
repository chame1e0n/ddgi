<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'policies';
}
