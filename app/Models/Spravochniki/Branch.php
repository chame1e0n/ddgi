<?php

namespace App\Models\Spravochniki;

use App\Models\Director;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Branch extends Model
{
    use SoftDeletes;

    protected $guarded=[];

    public function children(){
        return $this->hasMany( Branch::class, 'parent_id', 'id' );
    }

    public function parent(){
        return $this->hasOne( Branch::class, 'id', 'parent_id' );
    }

    /**
     * Get the branch's director info.
     */
    public function director()
    {
        return $this->hasOne(Director::class, 'user_id', 'user_id');
    }
}
