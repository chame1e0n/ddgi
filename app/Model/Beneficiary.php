<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'beneficiaries';
}
