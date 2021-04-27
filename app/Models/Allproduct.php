<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allproduct extends Model
{
    protected $table = 'all_products';
    protected $guarded=[''];

    static function createZalogImushestvo3x($request){

        $new = new Allproduct();
        $new->unique_number = $request->unique_number;
        $new->insurance_from = $request->insurance_from;
        $new->nomer_dogovor_strah_vigod = $request->nomer_dogovor_strah_vigod;
        $new->date_dogovor_strah_vigod = $request->date_dogovor_strah_vigod;
        $new->object_from_date = $request->object_from_date;
        $new->object_to_date = $request->object_to_date;
        $new->ocenka_osnovaniya = $request->ocenka_osnovaniya;
        $new->location = $request->location;
        if ($request->hasFile('fire_alarm_file')) {
            $image          = $request->file('fire_alarm_file')->store('/img/ZalogImushestvo3x', 'public');
            $new->fire_alarm_file   = $image;
        }
        if ($request->hasFile('security_file')) {
            $image          = $request->file('security_file')->store('/img/ZalogImushestvo3x', 'public');
            $new->security_file   = $image;
        }
        if ($request->hasFile('contract_file')) {
            $image          = $request->file('contract_file')->store('/img/ZalogImushestvo3x', 'public');
            $new->contract_file   = $image;
        }
        if ($request->hasFile('policy_file')) {
            $image          = $request->file('policy_file')->store('/img/ZalogImushestvo3x', 'public');
            $new->policy_file   = $image;
        }
        if ($request->hasFile('application_form_file')) {
            $image          = $request->file('application_form_file')->store('/img/ZalogImushestvo3x', 'public');
            $new->application_form_file   = $image;
        }
        $new->franshize_percent_1 = $request->franshize_percent_1;
        $new->franshize_percent_2 = $request->franshize_percent_2;
        $new->franshize_percent_3 = $request->franshize_percent_3;
        $new->save();
        return $new;
    }
}
