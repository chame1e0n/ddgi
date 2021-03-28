<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class OtvetstvennostRealtorInfo extends Model
{
    protected $guarded = [''];

    static function createRealtorInfo($request, $realtor_id){
        dd($request->all(),$realtor_id);
    }
}
