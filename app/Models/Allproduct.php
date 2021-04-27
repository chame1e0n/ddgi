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
        $new->save();
    }
}
