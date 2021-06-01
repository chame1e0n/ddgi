<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PolicyProperty extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'policy_properties';
}
