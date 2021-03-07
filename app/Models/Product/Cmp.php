<?php

namespace App\Models\Product;

use App\Models\PolicyHolder;
use App\Models\Product;
use App\Models\Policy;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cmp extends Model
{
    use SoftDeletes;
    protected $table = 'cmp';
    protected $guarded = [];

    public function product() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function policyHolder() {
        return $this->hasOne(PolicyHolder::class, 'id', 'policy_holder_id');
    }

    public function policy() {
        return $this->hasOne(Policy::class, 'id', 'policy_id');
    }

    public function agent() {
        return $this->hasOne(Agent::class, 'user_id', 'user_id');
    }

    public function policySeries() {
        return $this->hasOne(PolicySeries::class, 'id', 'policy_series_id');
    }
}
