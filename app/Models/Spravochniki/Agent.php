<?php

namespace App\Models\Spravochniki;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Agent extends Model
{
    use SoftDeletes;

    protected $guarded=[];

    /**
     * Get the agent's user profile.
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    static function getActiveAgent(){
        return self::where('status',0)->get();
    }
    public function getFI(){
        $surname = $this->surname;
        $name = $this->name;
        return $surname.' '.$name;
    }
    public function getFIO(){
        $surname = $this->surname;
        $name = $this->name;
        $middleName = $this->middle_name;
        return $surname.' '.$name. ' ' .$middleName;
    }

}
