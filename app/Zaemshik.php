<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zaemshik extends Model
{
    protected $fillable = ["FIO", "address", "tel", "passport", "passport_num"];
}

