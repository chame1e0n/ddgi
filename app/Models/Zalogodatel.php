<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zalogodatel extends Model
{
    protected $guarded = [];

    static function createZalogodatel($request)
    {
        $zalogodatel = Zalogodatel::create([
            'fio' => $request->fio_zalog,
            'address' => $request->address_zalog,
            'phone' => $request->phone_zalog,
            'checking_account' => $request->checking_account_zalog,
            'bank_id' => $request->bank_id_zalog,
            'inn' => $request->inn_zalog,
            'mfo' => $request->mfo_zalog,
            'oked' => $request->oked_zalog,
        ]);
        if ($zalogodatel)
            return $zalogodatel;
        else
            return false;
    }

    static function updateZalogodatel($id, $request)
    {
        $zalogodatel = Zalogodatel::find($id);
        $zalogodatel->update([
            'fio' => $request->fio_zalog,
            'address' => $request->address_zalog,
            'phone' => $request->phone_zalog,
            'checking_account' => $request->checking_account_zalog,
            'bank_id' => $request->bank_id_zalog,
            'inn' => $request->inn_zalog,
            'mfo' => $request->mfo_zalog,
            'oked' => $request->oked_zalog,
        ]);
        if ($zalogodatel)
            return $zalogodatel;
        else
            return false;
    }
}
