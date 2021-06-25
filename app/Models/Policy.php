<?php

namespace App\Models;

use App\Models\Spravochniki\Branch;
use App\Models\Spravochniki\PolicySeries;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Policy extends Model
{
    use SoftDeletes;

    protected $guarded=[];

    const STATUS = [
        "new" => "Новый",
        'pending_transfer' => 'В ожидании распределении',
        'rejected_transfer' => 'Отказано в распределении',
        'transferred' => 'Распределен',
        'retransferred' => 'Перераспределен',
        "cancelling" => "Испорчен",
        "lost" => "Утерян",
        "terminated" => "Расторгнут",
        "policy_transfer" => "Прием-передача полисов",
        "underwritting" =>"Андеррайтинг"
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function scopeValidPolicies($q)
    {
           return $q->whereNotIn('status', ['lost', 'cancelling', 'terminated', 'underwritting']);
    }

    /**
     * Get the policy series.
     */
    public function policySeries()
    {
        return $this->hasOne(PolicySeries::class, 'id', 'policy_series_id');
    }

    public function branch()
    {
        return $this->hasOne(Branch::class, 'id', 'branch_id');
    }
}
