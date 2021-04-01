<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notary extends Model
{
    use SoftDeletes;
    protected $table = 'otvetstvennost_natarius';
    protected $guarded = [];
}
