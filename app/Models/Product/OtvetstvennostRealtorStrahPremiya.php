<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class OtvetstvennostRealtorStrahPremiya extends Model
{
    protected $guarded = [''];
    static function createRealtorStrahPremiya($request, $realtor_id){
        $data = $request->all();
        $count = count($data['payment_sum']);

        for ($i=0; $i<$count; $i++) {

            if($data['payment_sum'][$i] && $data['payment_from'][$i]){
                $create = new self();

                $create->otvetstvennost_realtor_id = $realtor_id;
                $create->prem_sum = $data['payment_sum'][$i];
                $create->prem_from = $data['payment_from'][$i];

                $create->save();
            }

        }
        return $create ?? false;
    }
}
