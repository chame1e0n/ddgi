<?php

namespace App\Models;

use App\Models\Product\Kasko;
use App\Models\Spravochniki\Bank;
use Illuminate\Database\Eloquent\Model;

class PolicyHolder extends Model
{
    protected $guarded = [];

    public function kasko()
    {
        return $this->belongsToMany(
            Kasko::class,
            'kasko_policy_holders',
            'policy_holders_id',
            'kasko_id');
    }

    static function createPolicyHolders($request)
    {
        $policyHolder = PolicyHolder::create([
            'FIO' => $request->fio_insurer,
            'address' => $request->address_insurer,
            'phone_number' => $request->tel_insurer,
            'checking_account' => $request->address_schet,
            'inn' => $request->inn_insurer,
            'mfo' => $request->mfo_insurer,
            'oked' => $request->oked_insurer,
            'okonx' => $request->okonx_insurer,
            'vid_deyatelnosti' => $request->vid_deyatelnosti,
            'bank_id' => $request->bank_insurer,

        ]);
        if ($policyHolder)
            return $policyHolder;
        else
            return false;
    }

    static function updatePolicyHolders($id, $request)
    {
        $policyHolder = PolicyHolder::find($id);
        $policyHolder->update([
            'FIO' => $request->fio_insurer,
            'address' => $request->address_insurer,
            'phone_number' => $request->tel_insurer,
            'checking_account' => $request->address_schet,
            'inn' => $request->inn_insurer,
            'mfo' => $request->mfo_insurer,
            'okonx' => $request->okonx_insurer,
            'oked' => $request->oked_insurer,
            'vid_deyatelnosti' => $request->vid_deyatelnosti,
            'bank_id' => $request->bank_insurer,
        ]);
        if ($policyHolder)
            return $policyHolder;
        else
            return false;
    }

    public function bank()
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }
}
