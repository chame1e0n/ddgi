<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ZalogImushestvoInfo extends Model
{
   protected $guarded = [];

    static function createZalogImushestvoInfo($request, $zalogImushestvo)
    {
        $data = $request->all();
        $countIteration = count($data['name_property']);
        for ($i=0; $i<$countIteration; $i++){
            $create = new ZalogImushestvoInfo();
            $create->name_property = $data['name_property'][$i];
            $create->place_property = $data['place_property'][$i];
            $create->date_of_issue_property = $data['date_of_issue_property'][$i];
            $create->count_property = $data['count_property'][$i];
            $create->units_property = $data['units_property'][$i];
            $create->insurance_cost = $data['insurance_cost'][$i];
            $create->insurance_sum = $data['insurance_sum'][$i];
            $create->insurance_premium = $data['insurance_premium'][$i];

            $create->zalog_imushestvo_id = $zalogImushestvo->id;
            $create->save();
        }
        return $create ?? false;
    }

    static function updateZalogImushestvoInfo($request, $zalogImushestvo)
    {
        $data = $request->all();
        $zalogImushestvo->infos()->forceDelete();
        $countIteration = count($data['name_property']);
        for ($i=0; $i<$countIteration; $i++){
            $create = new ZalogImushestvoInfo();
            $create->name_property = $data['name_property'][$i];
            $create->place_property = $data['place_property'][$i];
            $create->date_of_issue_property = $data['date_of_issue_property'][$i];
            $create->count_property = $data['count_property'][$i];
            $create->units_property = $data['units_property'][$i];
            $create->insurance_cost = $data['insurance_cost'][$i];
            $create->insurance_sum = $data['insurance_sum'][$i];
            $create->insurance_premium = $data['insurance_premium'][$i];

            $create->zalog_imushestvo_id = $zalogImushestvo->id;
            $create->save();
        }
        return $create ?? false;
    }
}
