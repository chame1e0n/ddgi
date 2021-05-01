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
                $create->all_products_id = $id;
                $create->policy_number = $data['policy_number'][$i];
                $create->policy_series = $data['policy_series'][$i];
                $create->god_vipuska = $data['god_vipuska'][$i];
                $create->policy_insurance_from = $data['policy_insurance_from'][$i];
                $create->policy_insurance_to = $data['policy_insurance_to'][$i];
                $create->otvet_litso = $data['otvet_litso'][$i];
                $create->marka = $data['marka'][$i];
                $create->model = $data['model'][$i];

                $create->modification = $data['modification'][$i];
                $create->gos_nomer = $data['gos_nomer'][$i];
                $create->tex_passport = $data['tex_passport'][$i];
                $create->number_engine = $data['number_engine'][$i];
                $create->number_kuzov = $data['number_kuzov'][$i];
                $create->gryzopodemnost = $data['gryzopodemnost'][$i];


                $create->strah_stoimost = $data['strah_stoimost'][$i];
                $create->strah_sum = $data['strah_sum'][$i];
                $create->strah_prem = $data['strah_prem'][$i];
                $create->save();
            }
        }


        return $create ?? false;
    }

    static function updateInfo($product, $request){
        $data = $request->all();
        $product->informations()->forceDelete();
        if (isset($data['policy_number'])){
            $countIteration = count($data['policy_number']);
            for ($i=0; $i<$countIteration; $i++){
                $create = new self();
                $create->all_products_id = $product->id;
                $create->policy_number = $data['policy_number'][$i];
                $create->policy_series = $data['policy_series'][$i];
                $create->god_vipuska = $data['god_vipuska'][$i];
                $create->policy_insurance_from = $data['policy_insurance_from'][$i];
                $create->policy_insurance_to = $data['policy_insurance_to'][$i];
                $create->otvet_litso = $data['otvet_litso'][$i];
                $create->marka = $data['marka'][$i];
                $create->model = $data['model'][$i];

                $create->modification = $data['modification'][$i];
                $create->gos_nomer = $data['gos_nomer'][$i];
                $create->tex_passport = $data['tex_passport'][$i];
                $create->number_engine = $data['number_engine'][$i];
                $create->number_kuzov = $data['number_kuzov'][$i];
                $create->gryzopodemnost = $data['gryzopodemnost'][$i];


                $create->strah_stoimost = $data['strah_stoimost'][$i];
                $create->strah_sum = $data['strah_sum'][$i];
                $create->strah_prem = $data['strah_prem'][$i];
                $create->save();
            }
        }

        return $create ?? false;
    }

}
