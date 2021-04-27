<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllProductImushestvoInfo extends Model
{
    static function create($id, $request){
        $data = $request->all();
//dd($data);
        if (isset($data['name_property'])){
            $countIteration = count($data['name_property']);
            for ($i=0; $i<$countIteration; $i++){
                $create = new self();
                $create->all_product_id = $id;
                $create->name_property = $data['name_property'][$i];
                $create->place_property = $data['place_property'][$i];
                $create->date_of_issue_property = $data['date_of_issue_property'][$i];
                $create->count_property = $data['count_property'][$i];
                $create->units_property = $data['units_property'][$i];
                $create->insurance_cost = $data['insurance_cost'][$i];
                $create->insurance_sum = $data['insurance_sum'][$i];
                $create->insurance_premium = $data['insurance_premium'][$i];
                $create->save();
            }
        }

        return $create ?? false;
    }
}
