<?php

namespace App\Models;

use App\Models\Product\Kasko;
use Illuminate\Database\Eloquent\Model;

class PolicyHolder extends Model
{
    protected $guarded = [];

    public function kasko() {
        return $this->belongsToMany(
            Kasko::class,
            'kasko_policy_holders',
            'policy_holders_id',
            'kasko_id');
    }
}
