<?php

namespace App\Http\Controllers\Product3777;

use App\Http\Controllers\Controller;
use App\Models\PolicyHolder;
use App\Product3777;
use App\Zaemshik;
use Illuminate\Http\Request;

class Product3777Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('products.product3777.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'fio_insurer' => 'required',
            'address_insurer' => 'required',
            'tel_insurer' => 'required',
            'address_schet' => 'required',
            'inn_insurer' => 'required',
            'mfo_insurer' => 'required',
            'okonh_insurer' => 'required',
            'bank_insurer' => 'required',

            'fio_beneficiary' => 'required',
            'address_beneficiary' => 'required',
            'tel_beneficiary' => 'required',
            'passport_beneficiary' => 'required',
            'passport_num_beneficiary' => 'required',

            'dogovor_lizing_num' => 'required',
            'insurance_from' => 'required',
            'insurance_to' => 'required',
            'insurance_aim' => 'required',
            'insurance_sum' => 'required',
            'currency' => 'required',
            'franshiza' => 'required',
            'object_from_date' => 'required',
            'object_to_date' => 'required',
            'other_info' => 'required',
            'insurance_total_sum' => 'required',
            'insurance_gift' => 'required',
            'payment_currency' => 'required',
            'payment_term' => 'required',
            'polis_series' => 'required',
            'polis_from' => 'required',
            'litso' => 'required',
            'passport_copy' => 'required',
            'dogovor_copy' => 'required',
            'spravka_copy' => 'required',
            'other' => 'required',
        ]);

        $policyHolder = PolicyHolder::create([
            'FIO' => $request->fio_insurer,
            'address' => $request->address_insurer,
            'phone_number' => $request->tel_insurer,
            'checking_account' => $request->address_schet,
            'inn' => $request->inn_insurer,
            'mfo' => $request->mfo_insurer,
            'okonx' => $request->okonh_insurer,
            'bank_id' => $request->bank_insurer,
        ]);

        $zaemshik = Zaemshik::create([
            'FIO' => $request->fio_insurer,
            'address' => $request->address_insurer,
            'tel' => $request->tel_insurer,
            'passport' => $request->address_schet,
            'passport_num' => $request->inn_insurer,
        ]);
        $passport_copy_path = $request->passport_copy->store("documents");
        $dogovor_copy_path = $request->dogovor_copy->store("documents");
        $spravka_copy_path = $request->spravka_copy->store("documents");
        $other_path = $request->other->store("documents");
        $product3777 = Product3777::create([
            'policy_holder_id' => $policyHolder->id,
            'zaemshik_id' => $zaemshik->id,
            'dogovor_lizing_num' => $request->dogovor_lizing_num,
            'insurance_from' => $request->insurance_from,
            'insurance_to' => $request->insurance_to,
            'insurance_aim' => $request->insurance_aim,
            'insurance_sum' => $request->insurance_sum,
            'currency' => $request->currency,
            'franshiza' => $request->franshiza,
            'object_from_date' => $request->object_from_date,
            'object_to_date' => $request->object_to_date,
            'other_info' => $request->other_info,
            'insurance_total_sum' => $request->insurance_total_sum,
            'insurance_gift' => $request->insurance_gift,
            'payment_currency' => $request->payment_currency,
            'payment_term' => $request->payment_term,
            'polis_series' => $request->polis_series,
            'polis_from' => $request->polis_from,
            'litso' => $request->litso,
            'passport_copy' => $passport_copy_path,
            'dogovor_copy' => $dogovor_copy_path,
            'spravka_copy' => $spravka_copy_path,
            'other' => $other_path,
        ]);

        return "Saved successfully";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
