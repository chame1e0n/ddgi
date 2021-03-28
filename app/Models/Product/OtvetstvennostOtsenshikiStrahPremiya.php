<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class OtvetstvennostOtsenshikiStrahPremiya extends Model
{
    protected $guarded = [''];
    protected $table = 'otvetstvennost_otsenshiki_strah_premiyas';

    static function createOtsenshikiStrahPremiya($request, $otsenshik_id){
        $data = $request->all();

        $count = count($data['prem_sum']);

        for ($i=0; $i<$count; $i++) {

            if($data['prem_sum'][$i] && $data['prem_from'][$i]){
                $create = new self();

                $create->otvetstvennost_otsenshiki_id = $otsenshik_id;
                $create->prem_sum = $data['prem_sum'][$i];
                $create->prem_from = $data['prem_from'][$i];

                $create->save();
            }

        }
        return $create ?? false;
    }
}
