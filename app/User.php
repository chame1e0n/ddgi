<?php

namespace App;

use App\Models\Director;
use App\Models\Spravochniki\Branch;
use App\Models\Spravochniki\Manager;
use App\Models\Spravochniki\UserInformation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Spravochniki\Agent;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Get the branch(офис) profile.
     */
    public function brnach()
    {
        return $this->hasOne(Branch::class);
    }

    /**
     * Get the agent profile.
     */
    public function agent()
    {
        return $this->hasOne(Agent::class);
    }

    /**
     * Get the manager profile.
     */
    public function manager()
    {
        return $this->hasOne(Manager::class);
    }

    /**
     * Get the agent profile.
     */
    public function agents()
    {
        return $this->hasMany(Agent::class);
    }

    /**
     * Get the manager profile.
     */
    public function managers()
    {
        return $this->hasMany(Manager::class);
    }

    /**
     * Get the director profile.
     */
    public function director()
    {
        return $this->hasOne(Director::class);
    }
}
