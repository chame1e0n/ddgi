<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Director extends Model
{
    use SoftDeletes;

    protected $guarded=[];

    /**
     * Get the director's user profile.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
