<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class CovidPolicyInformation extends Model
{
    protected $guarded = [];

    static function createCovidInfo($request, $covid){
        $data = $request->all();
        $countIteration = count($data['policy_series_id']);
        for ($i=0; $i<$countIteration; $i++){
            $create = new CovidPolicyInformation();
            $create->policy_series_id = $data['policy_series_id'][$i];
            $create->person_name = $data['person_name'][$i];
            $create->person_surname = $data['person_surname'][$i];
            $create->person_lastname = $data['person_lastname'][$i];
            $create->series_and_number_passport = $data['series_and_number_passport'][$i];
            $create->place_of_issue_passport = $data['place_of_issue_passport'][$i];
            $create->date_of_issue_passport = $data['date_of_issue_passport'][$i];

            $create->insurance_cost = $data['insurance_cost'][$i];
            $create->insurance_sum = $data['insurance_sum'][$i];
            $create->insurance_premium = $data['insurance_premium'][$i];
            $create->covid_id = $covid->id;
            $create->save();
        }
        return $create ?? false;
    }

    static function updateCovidInfo($request, $covid){
        $data = $request->all();
        $covid->infos()->forceDelete();
        $countIteration = count($data['policy_series_id']);
        for ($i=0; $i<$countIteration; $i++){
            $create = new CovidPolicyInformation();
            $create->policy_series_id = $data['policy_series_id'][$i];
            $create->person_name = $data['person_name'][$i];
            $create->person_surname = $data['person_surname'][$i];
            $create->person_lastname = $data['person_lastname'][$i];
            $create->series_and_number_passport = $data['series_and_number_passport'][$i];
            $create->place_of_issue_passport = $data['place_of_issue_passport'][$i];
            $create->date_of_issue_passport = $data['date_of_issue_passport'][$i];

            $create->insurance_cost = $data['insurance_cost'][$i];
            $create->insurance_sum = $data['insurance_sum'][$i];
            $create->insurance_premium = $data['insurance_premium'][$i];
            $create->covid_id = $covid->id;
            $create->save();
        }
        return $create ?? false;
    }
}
