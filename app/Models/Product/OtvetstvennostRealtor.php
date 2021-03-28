<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class OtvetstvennostRealtor extends Model
{
    protected $guarded = [''];

    static function createRealtor($request){
        $data = $request->all();
        $data['total_turnover'] = $data['first_turnover'] + $data['second_turnover'];
        $data['total_profit'] =  $data['first_profit'] + $data['second_profit'];
        $create = new OtvetstvennostRealtor();
        $create->fill($data);
        $create->save();

        return $create;
    }
}
