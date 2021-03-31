<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class KaskoPolicyInformationModel extends Model
{
    protected $table = 'kasko_policy_informations';
    static function createPolicyInfo($request, $kasco_id){
        $data = $request->all();
        if (isset($data['series_number'])){
            $count = count($data['series_number']);
            $arrayField = [
            'polis_god_vupyska',
            'polis_date_from',
            'polis_date_to',
            'polis_marka',
            'polis_model',
            'polis_gos_nomer',
            'polis_nomer_tex_passporta',
            'polis_nomer_dvigatelya',
            'polis_nomer_kuzova',
            'polis_gruzopodoemnost',
            'polis_strah_value',
            'polis_strah_sum',
            'polis_strah_premia',
            'mark_model',
            'name',
            'series_number',
            'insurance_sum',
            'cover_terror_attacks_sum',
            'cover_terror_attacks_currency',
            'cover_terror_attacks_insured_sum',
            'cover_terror_attacks_insured_currency',
            'coverage_evacuation_cost',
            'coverage_evacuation_currency',
            'other_insurance_info',
            'one_sum',
            'one_premia',
            'one_franshiza',
            'tho_sum',
            'two_preim',
            'driver_quantity',
            'driver_one_sum',
            'driver_currency',
            'driver_total_sum',
            'driver_preim_sum',
            'passenger_quantity',
            'passenger_one_sum',
            'passenger_currency',
            'passenger_total_sum',
            'limit_quantity',
            'limit_one_sum',
            'limit_currency',
            'limit_total_sum',
            'limit_preim_sum',
            'total_liability_limit',
            'total_liability_limit_currency',
            'policy_id',
            'agent_id',
            'payment',
            'payment_order',
            'overall_sum',
            'policy_series_id',
            'policy_agent_id',
                'from_date'];
            for ($i=0;$i<$count;$i++){
                $create = new KaskoPolicyInformationModel();
                foreach($arrayField as $field){
                    $create->$field
                        = $data[$field][$i];

                }
                $create->kasko_id = $kasco_id;
                $create->save();
            }
            return $create;
        }
    }

    static function updateePolicyInfo($request, $kasko){
        $data = $request->all();
        $kasko->policyInformations()->forceDelete();
        if (isset($data['series_number'])) {
            $count = count($data['series_number']);
            $arrayField = [
                'polis_god_vupyska',
                'polis_date_from',
                'polis_date_to',
                'polis_marka',
                'polis_model',
                'polis_gos_nomer',
                'polis_nomer_tex_passporta',
                'polis_nomer_dvigatelya',
                'polis_nomer_kuzova',
                'polis_gruzopodoemnost',
                'polis_strah_value',
                'polis_strah_sum',
                'polis_strah_premia',
                'mark_model',
                'name',
                'series_number',
                'insurance_sum',
                'cover_terror_attacks_sum',
                'cover_terror_attacks_currency',
                'cover_terror_attacks_insured_sum',
                'cover_terror_attacks_insured_currency',
                'coverage_evacuation_cost',
                'coverage_evacuation_currency',
                'other_insurance_info',
                'one_sum',
                'one_premia',
                'one_franshiza',
                'tho_sum',
                'two_preim',
                'driver_quantity',
                'driver_one_sum',
                'driver_currency',
                'driver_total_sum',
                'driver_preim_sum',
                'passenger_quantity',
                'passenger_one_sum',
                'passenger_currency',
                'passenger_total_sum',
                'limit_quantity',
                'limit_one_sum',
                'limit_currency',
                'limit_total_sum',
                'limit_preim_sum',
                'total_liability_limit',
                'total_liability_limit_currency',
                'policy_id',
                'agent_id',
                'payment',
                'payment_order',
                'overall_sum',
                'policy_series_id',
                'policy_agent_id',
                'from_date'];
            for ($i = 0; $i < $count; $i++) {
                $create = new KaskoPolicyInformationModel();
                foreach ($arrayField as $field) {
                    $create->$field
                        = $data[$field][$i];

                }
                $create->kasko_id = $kasko->id;
                $create->save();
            }
            return $create;
        }
    }
}
