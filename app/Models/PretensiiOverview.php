<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PretensiiOverview extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'pretensii_overview';

    public function pretensii()
    {
        return $this->hasOne(Pretensii::class, 'id', 'pretensii_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
