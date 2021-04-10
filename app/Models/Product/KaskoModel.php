<?php

namespace App\Models\Product;

use App\Models\Policy;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\PolicyInformation;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class KaskoModel extends Model
{


    protected $guarded = [''];
    protected $table = 'kasko';

    public function product() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function KascoStrahPremiya()
    {
        return $this->hasMany(KascoStrahPremiya::class, 'kasco_id', 'id');
    }
    public function policyHolders()
    {
        return $this->belongsTo(PolicyHolder::class, 'policy_holder_id');
    }
    public function PolicyBeneficiaries()
    {
        return $this->belongsTo(PolicyBeneficiaries::class, 'policy_beneficiary_id');
    }
    public function policyInformations() {
        return $this->hasMany( KaskoPolicyInformationModel::class, 'kasko_id', 'id' );
    }

    static function createKasko($request, $policy_holder_id,$policy_beneficiary_id){
        $data = $request->all();
        $kasko = new KaskoModel();
        $kasko->policy_holder_id = $policy_holder_id;
        $kasko->policy_beneficiary_id = $policy_beneficiary_id;
        $kasko->fill($data);
        if($request->hasFile('dogovor')){
            $dogovor = $request->file('dogovor')->store('/kasko', 'public');
            $kasko->dogovor = $dogovor;
        }
        if($request->hasFile('anketa')){
            $anketa = $request->file('anketa')->store('/kasko', 'public');
            $kasko->anketa = $anketa;
        }
        if($request->hasFile('polis')){
            $polis = $request->file('polis')->store('/kasko', 'public');
            $kasko->polis = $polis;
        }
        $kasko->save();

        return $kasko;
    }

    static function updateKasco($request, $policy_holder_id,$policy_beneficiary_id, $id){
        $data = $request->all();
        $kasko = self::find($id);
        $kasko->policy_holder_id = $policy_holder_id;
        $kasko->policy_beneficiary_id = $policy_beneficiary_id;
        $kasko->fill($data);
        if($request->hasFile('dogovor')){
            $dogovor = $request->file('dogovor')->store('/kasko', 'public');
            $kasko->dogovor = $dogovor;
        }
        if($request->hasFile('anketa')){
            $anketa = $request->file('anketa')->store('/kasko', 'public');
            $kasko->anketa = $anketa;
        }
        if($request->hasFile('polis')){
            $polis = $request->file('polis')->store('/kasko', 'public');
            $kasko->polis = $polis;
        }
        $kasko->save();

        return $kasko;
    }
}
