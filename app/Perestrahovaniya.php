<?php

namespace App;

use App\Models\Policy;
use App\Models\Spravochniki\PolicySeries;
use App\PerestrahovaniyaOverview;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perestrahovaniya extends Model
{
    use SoftDeletes;

    public $table='perestrahovaniyas';
    protected $guarded=[];

    public function user()
    {
        return $this->hasone(User::class, 'id', 'user_id');
    }

    public function policy()
    {
        return $this->hasOne(Policy::class, 'id', 'policy_id');
    }

    public function policySeries()
    {
        return $this->hasOne(PolicySeries::class, 'id', 'policy_series_id');
    }

    public function perestrahovaniyaOverview()
    {
        return $this->hasMany(PerestrahovaniyaOverview::class, 'perestrahavniya_id', 'id')->with('user');
    }
}
