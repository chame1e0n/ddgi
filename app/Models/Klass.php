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
        return $this->belongsToMany(
            Group::class,
            'kasko_policy_beneficiaries',
            'klass_id',
            'group_id');
    }
}
