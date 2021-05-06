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

    public function scopeFilter($q)
    {
        if (request('status')) {
            $q->where('status', request('status'));
        }

        if (request('user_id')) {
            $q->where('user_id', request('user_id'));
        }

        if (request('polis_from_date')) {
            $q->where('polis_from_date', request('polis_from_date'));
        }

        if (request('polis_to_date')) {
            $q->where('polis_to_date', request('polis_to_date'));
        }

        if (request('branch_id')) {
            $q->where('branch_id', request('branch_id'));
        }

        return $q;
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
