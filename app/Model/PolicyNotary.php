<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PolicyNotary extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'policy_notaries';
}
