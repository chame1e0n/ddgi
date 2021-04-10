<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Neshchastka24timeInformation extends Model
{
    protected $table = 'neshchastka24time_information';
    static function createInfo($time, $request){
        $data = $request->all();
//dd($data);
        if (isset($data['period_polis'])){
            $countIteration = count($data['period_polis']);
            for ($i=0; $i<$countIteration; $i++){
                $create = new self();
                $create->neshchastka24_time_id = $time->id;
                $create->polis_id = $data['polis_id'][$i];
                $create->agents = $data['agents'][$i];
                $create->period_polis = $data['period_polis'][$i];
                $create->polis_agent = $data['polis_agent'][$i];
                $create->polis_model = $data['polis_model'][$i];
                $create->polis_modification = $data['polis_modification'][$i];
                $create->polis_teh_passport = $data['polis_teh_passport'][$i];
                $create->polis_num_engine = $data['polis_num_engine'][$i];
                $create->polis_num_body = $data['polis_num_body'][$i];
                $create->polis_payload = $data['polis_payload'][$i];
                $create->save();
            }
        }

        return $create ?? false;
    }

    static function updateInfo($time, $request){
        $data = $request->all();
        $time->policyInformations()->forceDelete();
        if (isset($data['period_polis'])) {
            $countIteration = count($data['policy_series_id']);
            for ($i = 0; $i < $countIteration; $i++) {
                $create = new self();
                $create->neshchastka24_time_id = $time->id;
                $create->polis_id = $data['polis_id'][$i];
                $create->agents = $data['agents'][$i];
                $create->period_polis = $data['period_polis'][$i];
                $create->polis_agent = $data['polis_agent'][$i];
                $create->polis_model = $data['polis_model'][$i];
                $create->polis_modification = $data['polis_modification'][$i];
                $create->polis_teh_passport = $data['polis_teh_passport'][$i];
                $create->polis_num_engine = $data['polis_num_engine'][$i];
                $create->polis_num_body = $data['polis_num_body'][$i];
                $create->polis_payload = $data['polis_payload'][$i];
                $create->save();
            }
        }
        return $create ?? false;
    }
}
