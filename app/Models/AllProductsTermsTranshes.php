<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AllProductsTermsTranshes extends Model
{
    protected $table = 'all_products_terms_transhes';
    protected $guarded=[''];

    static function create($id, $request){
        $data = $request->all();
        $count = count($data['payment_sum']);

        for ($i=0; $i<$count; $i++) {

            if($data['payment_sum'][$i] && $data['payment_from'][$i]){
                $create = new self();

                $create->all_products_id = $id;
                $create->payment_sum = $data['payment_sum'][$i];
                $create->payment_from = $data['payment_from'][$i];

                $create->save();
            }

        }
        return $create ?? false;

    }
}
