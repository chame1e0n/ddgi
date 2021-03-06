<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Klass extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'klass';

    public function group() {
        return $this->hasOne(Group::class, 'id', 'group_id');
    }
}
