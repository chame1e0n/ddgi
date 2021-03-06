<?php

namespace App\Models\Spravochniki;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Manager extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'managers';

    /**
     * Get the agent's user profile.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
