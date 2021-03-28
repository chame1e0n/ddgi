<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class OtvetstvennostOtsenshikiInfo extends Model
{
    protected $table = 'otvetstvennost_otsenshiki_info';
    protected $guarded = [''];

    static function createOtsenshikInfo($request, $otsenshik_id){
        dd($request->all(),$otsenshik_id);
    }
}
