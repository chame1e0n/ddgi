<?php

namespace App\Models;

use App\Models\Product\Kasko;
use Illuminate\Database\Eloquent\Model;

class PolicyHolder extends Model
{
    protected $guarded = [];

    public function kasko() {
        return $this->belongsToMany(
            Kasko::class,
            'kasko_policy_holders',
            'policy_holders_id',
            'kasko_id');
    }

    static function createPolicyHolders($request)
    {
        $policyHolder = PolicyHolder::create([
            'FIO' => $request->fio_insurer ?? null,
            'address' => $request->address_insurer ?? null,
            'phone_number' => $request->tel_insurer ?? null,
            'checking_account' => $request->address_schet ?? null,
            'inn' => $request->inn_insurer ?? null,
            'mfo' => $request->mfo_insurer ?? null,
            'oked' => $request->oked ?? null,
            'okonx' => $request->okonh_insurer ?? null,
            'vid_deyatelnosti' => $request->vid_deyatelnosti ?? null,
            'bank_id' => $request->bank_insurer ?? null,
        ]);
        if($policyHolder)
            return $policyHolder;
        else
            return false;
    }

    static function updatePolicyHolders($id, $request)
    {
        $policyHolder = PolicyHolder::find($id);
        $policyHolder->update([
            'FIO' => $request->fio_insurer ?? null,
            'address' => $request->address_insurer ?? null,
            'phone_number' => $request->tel_insurer ?? null,
            'checking_account' => $request->address_schet ?? null,
            'inn' => $request->inn_insurer ?? null,
            'mfo' => $request->mfo_insurer ?? null,
            'okonx' => $request->okonh_insurer ?? null,
            'oked'  => $request->oked ?? null,
            'bank_id' => $request->bank_insurer ?? null,
        ]);
        if($policyHolder)
            return true;
        else
            return false;
    }
}
