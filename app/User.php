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
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles, SoftDeletes;
    protected $guarded = [];
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'branch_id'
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
    public function branch()
    {
        return $this->hasOne(Branch::class, 'id', 'branch_id');
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
     * Get the director profile.
     */
    public function director()
    {
        return $this->hasOne(Director::class);
    }

    public function getFullNameAndPosition() {
        if ($this->agent()->count()) {
            return $this->getFullNameOfModel($this->agent) . ' - Агент';
        }

        if ($this->manager()->count()) {
            return $this->getFullNameOfModel($this->manager) . ' - Менеджер';
        }

        if ($this->director()->count()) {
            return $this->getFullNameOfModel($this->director) . ' - Директор';
        }

        //ToDo :: change to appropriate way of taking admin from db
        if($this->id == 3) {
            return 'Администратор';
        }
    }

    public function getFullNameOfModel($model) {
        return $model->surname .' '. $model->name .' '. $model->middle_name;
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
     * Get the directors profiles.
     */
    public function directors()
    {
        return $this->hasMany(Director::class);
    }


    /**
     * Get the features profile.
     */
    public function features()
    {
        return $this->hasOne(UserFeature::class);
    }
}
