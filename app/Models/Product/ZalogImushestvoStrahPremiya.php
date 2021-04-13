<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ZalogImushestvoStrahPremiya extends Model
{
    protected $guarded = [''];
    static function createImushestvoStrahPremiya($request, $zalog_imushestvo_id){
        $data = $request->all();
        $count = count($data['payment_sum']);

        for ($i=0; $i<$count; $i++) {

            if($data['payment_sum'][$i] && $data['payment_from'][$i]){
                $create = new self();

                $create->zalog_imushestvo_id = $zalog_imushestvo_id;
                $create->prem_sum = $data['payment_sum'][$i];
                $create->prem_from = $data['payment_from'][$i];

                $create->save();
            }

        }
        return $create ?? false;
    }

    static function updateImushestvoStrahPremiya($request, $zalogImushestvo){
        $data = $request->all();
        $zalogImushestvo->strahPremiya()->forceDelete();
        if($request->poryadok_oplaty_premii != 1)
        {
            $count = isset($data['payment_sum']) ? count($data['payment_sum']) : -1;
            for ($i=0; $i<$count; $i++) {

                if($data['payment_sum'][$i] && $data['payment_from'][$i]){
                    $create = new self();

                    $create->zalog_imushestvo_id = $zalogImushestvo->id;
                    $create->prem_sum = $data['payment_sum'][$i];
                    $create->prem_from = $data['payment_from'][$i];

                    $create->save();
                }

            }
        }

        return $create ?? false;
    }
}
