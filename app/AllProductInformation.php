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
    protected $casts = [
        'polis_number' => 'array',
        'god_vipuska' => 'array',
        'data_vidachi' => 'array',
        'mark' => 'array',
        'model' => 'array',
        'gos_nomer' => 'array',
        'nomer_teh_pasporta' => 'array',
        'nomer_dvigatelya' => 'array',
        'nomer_kuzova' => 'array',
        'strah_stoimost' => 'array',
        'strah_summa' => 'array',
        'strah_premiya' => 'array',

        'mark_model' => 'array',
        'name' => 'array',
        'series_number' => 'array',
        'insurance_sum' => 'array',
        'cover_terror_attacks_sum' => 'array',
        'cover_terror_attacks_currency' => 'array',
        'cover_terror_attacks_insured_sum' => 'array',
        'cover_terror_attacks_insured_currency' => 'array',
        'coverage_evacuation_cost' => 'array',
        'coverage_evacuation_currency' => 'array',
        'strtahovka' => 'array',
        'other_insurance_info' => 'array',
        'vehicle_damage' => 'array',
        'one_sum' => 'array',
        'one_premia' => 'array',
        'one_franshiza' => 'array',
        'civil_liability' => 'array',
        'tho_sum' => 'array',
        'two_preim' => 'array',
        'accidents' => 'array',
        'driver_quantity' => 'array',
        'driver_one_sum' => 'array',
        'driver_currency' => 'array',
        'driver_total_sum' => 'array',
        'driver_preim_sum' => 'array',
        'passenger_quantity' => 'array',
        'passenger_one_sum' => 'array',
        'passenger_currency' => 'array',
        'passenger_total_sum' => 'array',
        'passenger_preim_sum' => 'array',
        'limit_one_sum' => 'array',
        'limit_currency' => 'array',
        'limit_total_sum' => 'array',
        'limit_preim_sum' => 'array',
    ];



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
