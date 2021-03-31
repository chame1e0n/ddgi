<?php

namespace App\Models;

use App\Models\Product\Kasko;
use Illuminate\Database\Eloquent\Model;

class PolicyBeneficiaries extends Model
{
    protected $guarded = [];
    protected $table = 'policy_beneficiaries';

    public function kasko() {
        return $this->belongsToMany(
            Kasko::class,
            'kasko_policy_beneficiaries',
            'policy_beneficiary_id',
            'kasko_id');
    }

    static function createPolicyBeneficiaries($request){
        $policyBeneficiaries = self::create([
            'FIO' => $request->post('fio_beneficiary'),
            'address' => $request->post('address_beneficiary'),
            'phone_number' => $request->post('tel_beneficiary'),
            'checking_account' => $request->post('beneficiary_schet'),
            'inn' => $request->post('inn_beneficiary'),
            'mfo' => $request->post('mfo_beneficiary'),
            'okonx' => $request->post('okonx_beneficiary'),
            'bank_id' => $request->post('bank_beneficiary'),
            'seria_passport' => $request->post('seria_passport'),
            'nomer_passport' => $request->post('nomer_passport'),
            'oked' => $request->post('oked_beneficiary'),
        ]);
        if($policyBeneficiaries)
            return $policyBeneficiaries;
        else
            return false;
    }

    static function updatePolicyBeneficiaries($id, $request){
        $policyBeneficiaries = PolicyBeneficiaries::find($id);
        $policyBeneficiaries->update([
            'FIO' => $request->post('fio_beneficiary'),
            'address' => $request->post('address_beneficiary'),
            'phone_number' => $request->post('tel_beneficiary'),
            'checking_account' => $request->post('beneficiary_schet'),
            'inn' => $request->post('inn_beneficiary'),
            'mfo' => $request->post('mfo_beneficiary'),
            'okonx' => $request->post('okonx_beneficiary'),
            'bank_id' => $request->post('bank_beneficiary'),
            'seria_passport' => $request->post('seria_passport'),
            'nomer_passport' => $request->post('nomer_passport'),
            'oked' => $request->post('oked'),
        ]);
        if($policyBeneficiaries)
            return $policyBeneficiaries;
        else
            return false;
    }
}
