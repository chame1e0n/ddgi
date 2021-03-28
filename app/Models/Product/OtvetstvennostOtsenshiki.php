<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class OtvetstvennostOtsenshiki extends Model
{
    protected $table = 'otvetstvennost_otsenshiki';
    protected $guarded = [''];

    static function createOtsenshik($request){
        $data = $request->all();
        $data['total_turnover'] = $data['first_turnover'] + $data['second_turnover'];
        $data['total_profit'] =  $data['first_profit'] + $data['second_profit'];
        $create = new OtvetstvennostOtsenshiki();
        $create->fill($data);
        $create->save();

        return $create;
    }
}
