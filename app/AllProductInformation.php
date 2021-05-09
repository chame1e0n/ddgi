<?php

namespace App;

use App\Models\Policy;
use App\Models\Spravochniki\Agent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AllProductInformation extends Model
{
    use SoftDeletes;
    protected $table = 'all_product_information';
    protected $guarded = [];

    /**
     * Get the policy series.
     */
    public function allProducts()
    {
        return $this->hasOne(AllProduct::class, 'id', 'all_products_id');
    }

    public function policy()
    {
        return $this->hasOne(Policy::class, 'id', 'policy_id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'otvet_litso', 'id');
    }
}
