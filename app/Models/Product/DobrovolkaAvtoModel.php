<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class DobrovolkaAvtoModel extends Model
{
    protected $table = 'dobrovolka_avto';
    protected $guarded = [];

    static function createDobrovolkaAvto($request){
        self::create([
            'period_insurance_from' => $request->post('period_insurance_from'),
            'period_insurance_to' => $request->post('period_insurance_to'),
            'ispolzovaniya_TS_na_osnovanii' => $request->post('ispolzovaniya_TS_na_osnovanii'),
            'geograficheskaya_zona' => $request->post('geograficheskaya_zona'),
            'defects' => $request->post('defects'),
            'defects_images' => $request->post('defects_images'),
            'cel_ispolzovaniya' => $request->post('cel_ispolzovaniya'),
            'valyuta' => $request->post('valyuta'),
            'poryadok_oplaty_premii' => $request->post('poryadok_oplaty_premii'),
            'sposob_rascheta' => $request->post('sposob_rascheta'),
            'strahovaya_summa' => $request->post('strahovaya_summa'),
            'strahovaya_premiya' => $request->post('strahovaya_premiya'),
            'franshiza' => $request->post('franshiza'),
            'anketa' => $request->post('anketa'),
            'dogovor' => $request->post('dogovor'),
            'polis' => $request->post('polis'),
        ]);
    }
}
