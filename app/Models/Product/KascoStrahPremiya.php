<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class KascoStrahPremiya extends Model
{
    protected $table = 'kasco_strah_premiya';

    static function createStrahPremiya($request, $kasco_id){
        $data = $request->all();

        $count = isset($data['strah_sum']) ? count($data['strah_sum']) : -1;

        for ($i=0; $i<$count; $i++) {

            if($data['strah_sum'][$i] && $data['strah_date'][$i]){
                $create = new self();

                $create->otvetstvennost_otsenshiki_id = $kasco_id;
                $create->strah_sum = $data['strah_sum'][$i];
                $create->strah_date = $data['strah_date'][$i];

                $create->save();
            }

        }
        return $create ?? false;
    }
    static function updateStrahPremiya($request, $kasco){
        $data = $request->all();
        $kasco->KascoStrahPremiya()->forceDelete();
        $count = isset($data['strah_sum']) ? count($data['strah_sum']) : -1;

        for ($i=0; $i<$count; $i++) {

            if($data['strah_sum'][$i] && $data['strah_date'][$i]){
                $create = new self();

                $create->otvetstvennost_otsenshiki_id = $kasco->id;
                $create->strah_sum = $data['strah_sum'][$i];
                $create->strah_date = $data['strah_date'][$i];

                $create->save();
            }

        }
        return $create ?? false;
    }
}
