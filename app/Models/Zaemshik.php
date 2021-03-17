<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zaemshik extends Model
{
    protected $guarded = [];
    static function createZaemshik($request)
    {
        $zaemshik = Zaemshik::create([
            'z_fio' => $request->z_fio,
            'z_address' => $request->z_address,
            'z_phone' => $request->z_phone,
            'z_checking_account' => $request->z_checking_account,
            'z_inn' => $request->z_inn,
            'z_mfo' => $request->z_mfo,
            'z_okonx' => $request->z_okonx,
            'z_oked' => $request->z_oked,
            'bank_id' => $request->z_bank_id,
            'passport_series' => $request->passport_series,
            'passport_number' => $request->passport_number,
            'passport_issued' => $request->passport_issued,
            'passport_when_issued' => $request->passport_when_issued,
        ]);
        if($zaemshik)
            return $zaemshik;
        else
            return false;
    }

    static function updateZaemshik($zaemshikId, $request)
    {
        $zaemshik = Zaemshik::find($zaemshikId);
        $zaemshik->update([
            'z_fio' => $request->z_fio,
            'z_address' => $request->z_address,
            'z_phone' => $request->z_phone,
            'z_checking_account' => $request->z_checking_account,
            'z_inn' => $request->z_inn,
            'z_mfo' => $request->z_mfo,
            'z_oked' => $request->z_oked,
            'bank_id' => $request->z_bank_id,
            'passport_series' => $request->passport_series,
            'passport_number' => $request->passport_number,
            'passport_issued' => $request->passport_issued,
            'passport_when_issued' => $request->passport_when_issued,
        ]);
        if($zaemshik)
            return true;
        else
            return false;
    }
}

