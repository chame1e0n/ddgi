<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class OtvetstvennostOtsenshikiInfo extends Model
{
    protected $table = 'otvetstvennost_otsenshiki_info';
    protected $guarded = [''];

    static function createOtsenshikInfo($request, $otsenshik_id){
        $data = $request->all();

        $countIteration = count($data['policy_series_id']);
        for ($i=0; $i<$countIteration; $i++){
           $create = new OtvetstvennostOtsenshikiInfo();
           $create->policy_series_id = $data['policy_series_id'][$i];
            $create->from_date_polis = $data['from_date_polis'][$i];
            $create->to_date_polis = $data['to_date_polis'][$i];
            $create->agent_id = $data['agent_id'][$i];
            $create->insurer_fio = $data['insurer_fio'][$i];
            $create->specialty = $data['specialty'][$i];
            $create->experience = $data['experience'][$i];
            $create->position = $data['position'][$i];
            $create->time_stay = $data['time_stay'][$i];
            $create->insurer_price = $data['insurer_price'][$i];
            $create->insurer_sum = $data['insurer_sum'][$i];
            $create->insurer_premium = $data['insurer_premium'][$i];
            $create->otvetstvennost_otsenshiki_id = $otsenshik_id;
            $create->save();
        }
        return $create ?? false;
    }
}
