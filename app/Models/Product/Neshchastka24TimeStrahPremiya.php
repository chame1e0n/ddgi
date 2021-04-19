<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Neshchastka24TimeStrahPremiya extends Model
{
    protected $table = 'neshchastka24_times_strah_premiya';

    static function createStrah($t_id,$request){


        $data = $request->all();
//dd($data['payment_sum']);
        $count = isset($data['payment_sum']) ? count($data['payment_sum']) : -1;

        for ($i=0; $i<$count; $i++) {

            if($data['payment_sum'][$i] && $data['payment_sum'][$i]){
                $create = new self();
                $create->neshchastka24_time_id = $t_id->id;
                $create->payment_sum = $data['payment_sum'][$i];
                $create->payment_from = $data['payment_from'][$i];
    //    dd($create);
                $create->save();
            }

        }
        return $create ?? false;

    }

    static function updateStrah($t_id,$request){
        $data = $request->all();
        $t_id->StrahPremiya()->forceDelete();
        $count = isset($data['payment_sum']) ? count($data['payment_sum']) : -1;
        for ($i=0; $i<$count; $i++) {

            if($data['payment_sum'][$i] && $data['payment_from'][$i]){
                $create = new self();

                $create->neshchastka24_time_id = $t_id->id;
                $create->payment_sum = $data['payment_sum'][$i];
                $create->payment_from = $data['payment_from'][$i];

                $create->save();
            }

        }
        return $create ?? false;
    }
}
