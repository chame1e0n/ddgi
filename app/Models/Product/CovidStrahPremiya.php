<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class CovidStrahPremiya extends Model
{
    protected $guarded = [''];
    static function createCovidStrahPremiya($request, $covid_id){
        $data = $request->all();
        $count = count($data['payment_sum']);

        for ($i=0; $i<$count; $i++) {

            if($data['payment_sum'][$i] && $data['payment_from'][$i]){
                $create = new self();

                $create->covid_id = $covid_id;
                $create->prem_sum = $data['payment_sum'][$i];
                $create->prem_from = $data['payment_from'][$i];

                $create->save();
            }

        }
        return $create ?? false;
    }

    static function updateCovidStrahPremiya($request, $covid){
        $data = $request->all();
        $covid->strahPremiya()->forceDelete();
        if($request->poryadok_oplaty_premii != 1)
        {
            $count = isset($data['payment_sum']) ? count($data['payment_sum']) : -1;
            for ($i=0; $i<$count; $i++) {

                if($data['payment_sum'][$i] && $data['payment_from'][$i]){
                    $create = new self();

                    $create->covid_id = $covid->id;
                    $create->prem_sum = $data['payment_sum'][$i];
                    $create->prem_from = $data['payment_from'][$i];

                    $create->save();
                }

            }
        }

        return $create ?? false;
    }
}
