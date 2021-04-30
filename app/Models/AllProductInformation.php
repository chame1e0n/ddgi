<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllProductInformation extends Model
{
    protected $table = 'all_product_information';
    protected $guarded=[''];

    static function create($id, $request){
        $data = $request->all();

        if (isset($data['policy_number'])){
            $countIteration = count($data['policy_number']);
            for ($i=0; $i<$countIteration; $i++){
                $create = new self();
                $create->all_product_id = $id;
                $create->name_property = $data['policy_number'][$i];
                $create->place_property = $data['policy_series'][$i];
                $create->date_of_issue_property = $data['god_vipuska'][$i];
                $create->count_property = $data['policy_insurance_from'][$i];
                $create->units_property = $data['policy_insurance_to'][$i];
                $create->insurance_cost = $data['otvet_litso'][$i];
                $create->insurance_sum = $data['marka'][$i];
                $create->insurance_premium = $data['model'][$i];

                $create->date_of_issue_property = $data['modification'][$i];
                $create->count_property = $data['gos_nomer'][$i];
                $create->units_property = $data['tex_passport'][$i];
                $create->insurance_cost = $data['number_engine'][$i];
                $create->insurance_sum = $data['number_kuzov'][$i];
                $create->insurance_premium = $data['number_kuzov'][$i];


                $create->insurance_cost = $data['strah_stoimost'][$i];
                $create->insurance_sum = $data['strah_sum'][$i];
                $create->insurance_premium = $data['strah_prem'][$i];
                $create->save();
            }
        }

        return $create ?? false;
    }

    static function updateInfo($product, $request){
        $data = $request->all();
        $product->infos()->forceDelete();
        if (isset($data['policy_number'])){
            $countIteration = count($data['policy_number']);
            for ($i=0; $i<$countIteration; $i++){
                $create = new self();
                $create->all_product_id = $product->id;
                $create->name_property = $data['policy_number'][$i];
                $create->place_property = $data['policy_series'][$i];
                $create->date_of_issue_property = $data['god_vipuska'][$i];
                $create->count_property = $data['policy_insurance_from'][$i];
                $create->units_property = $data['policy_insurance_to'][$i];
                $create->insurance_cost = $data['otvet_litso'][$i];
                $create->insurance_sum = $data['marka'][$i];
                $create->insurance_premium = $data['model'][$i];

                $create->date_of_issue_property = $data['modification'][$i];
                $create->count_property = $data['gos_nomer'][$i];
                $create->units_property = $data['tex_passport'][$i];
                $create->insurance_cost = $data['number_engine'][$i];
                $create->insurance_sum = $data['number_kuzov'][$i];
                $create->insurance_premium = $data['number_kuzov'][$i];


                $create->insurance_cost = $data['strah_stoimost'][$i];
                $create->insurance_sum = $data['strah_sum'][$i];
                $create->insurance_premium = $data['strah_prem'][$i];
                $create->save();
            }
        }

        return $create ?? false;
    }

}
