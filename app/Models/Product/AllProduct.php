<?php

namespace App\Models\Product;

use App\Bonded;
use Illuminate\Database\Eloquent\Model;

class AllProduct extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    static function getAllProduct()
    {
        //ToDo:: complete it
        $cmp = Cmp::with('product', 'policySeries', 'policy', 'agent')->select('id', 'unique_number', 'product_id', 'policy_id', 'policy_series_id', 'user_id');
        $tamojnyaAddLegal = TamozhnyaAddLegal::with('product', 'policySeries', 'policy', 'agent')->select('id', 'unique_number', 'product_id', 'policy_id', 'serial_number_policy', 'otvet_litso');
        $otvetstvennostPodryadchik = OtvetstvennostPodryadchik::with('product', 'policySeries', 'policy', 'agent')->select('id', 'unique_number', 'product_id', 'policy_id', 'serial_number_policy', 'otvet_litso');

        return Bonded::with('product', 'policySeries', 'policy', 'agent')->select('id', 'unique_number', 'product_id', 'policy_id', 'policy_series_id', 'user_id')
            ->union($cmp)
            ->union($tamojnyaAddLegal)
            ->union($otvetstvennostPodryadchik);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllRequestProduct()
    {
        return TamozhnyaAddLegal::with('product', 'policySeries', 'policy', 'agent', 'requests')->has('requests')->get();
    }

}