<?php

namespace App\Models\Spravochniki;

use App\Models\Director;
use App\Models\Region;
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

    public function users(){
        return $this->hasMany( User::class, 'branch_id', 'id' );
    }

    public function agents(){
        return $this->hasManyThrough( Agent::class, User::class);
    }

    public function managers(){
        return $this->hasManyThrough( Manager::class, User::class);
    }

    public function parent(){
        return $this->hasOne( Branch::class, 'id', 'parent_id' );
    }

    public function region(){
        return $this->hasOne( Region::class, 'id', 'region_id' );
    }

    /**
     * Get the branch's director info.
     */
    public function director()
    {
        return $this->hasOne(Director::class, 'user_id', 'user_id');
    }

    public function delete(){
        //remove user (director) from branch while deactivate it (delete)
        $this->user_id = null;
        $this->save();
        return parent::delete();
    }
}
