<?php

namespace App;

use App\Models\PolicyHolder;
use App\Models\Spravochniki\Bank;
use Illuminate\Database\Eloquent\Model;

class Product3777 extends Model
{
    protected $table = 'product3777s';
    protected $guarded = [];

    public function policyHolder()
    {
        return $this->hasOne(PolicyHolder::class, 'id', 'policy_holder_id')
            ->with('bank');
    }

    public function zaemshik()
    {
        return $this->hasOne(Zaemshik::class, 'id', 'zaemshik_id');
    }

}
