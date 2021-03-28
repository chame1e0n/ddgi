<?php

namespace App\Models\Product;

use App\Models\PolicyHolder;
use Illuminate\Database\Eloquent\Model;

class OtvetstvennostRealtor extends Model
{
    protected $guarded = ['documents', 'anketa', 'dogovor', 'polis'];

    public function strahPremiya()
    {
        return $this->hasMany(OtvetstvennostRealtorStrahPremiya::class);
    }
    public function policyHolders()
    {
        return $this->belongsTo(PolicyHolder::class, 'policy_holder_id');
    }
    public function realtorInfos()
    {
        return $this->hasMany(OtvetstvennostRealtorInfo::class);
    }

    static function createRealtor($request, $policyHolder_id){
        $data = $request->all();
        $data['total_turnover'] = $data['first_turnover'] + $data['second_turnover'];
        $data['total_profit'] =  $data['first_profit'] + $data['second_profit'];
        $data['policy_holder_id'] = $policyHolder_id;
        $create = new OtvetstvennostRealtor();
        if (isset($data['documents']) && $request->hasFile('documents')){
            foreach($data['documents'] as $key => $doc){
                $documents[] = $doc->store('/otvetstvennost_otsenshiki', 'public');
            }
            $create->documents = serialize($documents);
        }

        if($request->hasFile('dogovor')){
            $dogovor = $request->file('dogovor')->store('/otvetstvennost_otsenshiki', 'public');
            $create->dogovor = $dogovor;
        }
        if($request->hasFile('anketa')){
            $anketa = $request->file('anketa')->store('/otvetstvennost_otsenshiki', 'public');
            $create->anketa = $anketa;
        }
        if($request->hasFile('polis')){
            $polis = $request->file('polis')->store('/otvetstvennost_otsenshiki', 'public');
            $create->polis = $polis;
        }
        $create->fill($data);
        $create->save();

        return $create;
    }
}
