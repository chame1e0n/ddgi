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
//        dd($request->all());
        self::create([
            'FIO' => $request->post('FIO'),
            'address' => $request->post('address'),
            'phone_number' => $request->post('phone_number'),
            'checking_account' => $request->post('checking_account'),
            'inn' => $request->post('inn'),
            'mfo' => $request->post('mfo'),
            'okonx' => $request->post('okonx'),
            'bank_id' => $request->post('bank_id'),
            'seria_passport' => $request->post('seria_passport'),
            'nomer_passport' => $request->post('nomer_passport'),
            'oked' => $request->post('oked'),

        ]);
    }
}
