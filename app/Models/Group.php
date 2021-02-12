<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function klass()
    {
        return $this->hasMany( Klass::class, 'group_id', 'id' );
    }
}
