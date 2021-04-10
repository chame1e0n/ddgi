<?php

namespace App\Models\Product;

use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use Illuminate\Database\Eloquent\Model;

class Neshchastka24Time extends Model
{
    public function StrahPremiya()
    {
        return $this->hasMany(Neshchastka24TimeStrahPremiya::class, 'neshchastka24_time_id', 'id');
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
        return $this->hasMany( Neshchastka24timeInformation::class, 'neshchastka24_time_id', 'id' );
    }
    protected $guarded = [''];
    static function createTime($p,$b,$request){
        $data = $request->all();

        $create = new self();
        $create->fill($data);
        $create->policy_holder_id = $p->id;
        $create->policy_beneficiary_id = $b->id;
        if($request->hasFile('dogovor')){
            $dogovor = $request->file('dogovor')->store('/time', 'public');
            $create->dogovor = $dogovor;
        }
        if($request->hasFile('anketa')){
            $anketa = $request->file('anketa')->store('/time', 'public');
            $create->anketa = $anketa;
        }
        if($request->hasFile('polis')){
            $polis = $request->file('polis')->store('/time', 'public');
            $create->polis = $polis;
        }
        $create->save();
        return $create;

    }

    static function updateTime($request, $id){
        $data = $request->all();

        $create = self::findorFail($id);
        $create->fill($data);
        if($request->hasFile('dogovor')){
            $dogovor = $request->file('dogovor')->store('/time', 'public');
            $create->dogovor = $dogovor;
        }
        if($request->hasFile('anketa')){
            $anketa = $request->file('anketa')->store('/time', 'public');
            $create->anketa = $anketa;
        }
        if($request->hasFile('polis')){
            $polis = $request->file('polis')->store('/time', 'public');
            $create->polis = $polis;
        }
        $create->save();
        return $create;

    }
}
