<?php

namespace App\Models;

use App\Models\Spravochniki\Branch;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Policy extends Model
{
    use SoftDeletes;

    protected $guarded=[];

    const STATUS = [
        "new" => "Новый",
        "cancelling" => "Испорчен",
        "lost" => "Утерян",
        "terminated" => "Расторгнут",
        "policy_transfer" => "Прием-передача полисов",
        "underwritting" =>"Андеррайтинг"
    ];

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
