<?php

namespace App\Http\Controllers;

use App\Models\PropertyLising;
use Illuminate\Http\Request;

class PropertyLisingZalog extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.about-imushestvo-lizing-zalog.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.about-imushestvo-lizing-zalog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $temp = PropertyLising::create([
            'client_type_radio' => $request->client_type_radio,
            'product_id' => $request->product_id,
            'fio_insurer' => $request->fio_insurer,
            'address_insurer' => $request->address_insurer,
            'tel_insurer' => $request->tel_insurer,
            'address_schet' => $request->address_schet,
            'inn_insurer' => $request->inn_insurer,
            'mfo_insurer' => $request->mfo_insurer,
            'bank_insurer' => $request->bank_insurer,
            'okonh_insurer' => $request->okonh_insurer,
            'fio_beneficiary' => $request->fio_beneficiary,
            'address_beneficiary' => $request->address_beneficiary,
            'tel_beneficiary' => $request->tel_beneficiary,
            'beneficiary_schet' => $request->beneficiary_schet,
            'inn_beneficiary' => $request->inn_beneficiary,
            'mfo_beneficiary' => $request->mfo_beneficiary,
            'bank_beneficiary' => $request->bank_beneficiary,
            'okonh_beneficiary' => $request->okonh_beneficiary,
            'dogovor_lizing_num' => $request->dogovor_lizing_num,
            'insurance_from' => $request->insurance_from,
            'insurance_to' => $request->insurance_to,
            'geo_zone' => $request->geo_zone,
            'polis_series_0' => $request->polis_series_0,
            'polis_mark_0' => $request->polis_mark_0,
            'polis_model_0' => $request->polis_model_0,
            'polis_modification_0' => $request->polis_modification_0,
            'overall_polis_sum_0' => $request->overall_polis_sum_0,
            'polis_premium_0' => $request->polis_premium_0,
            'cover_terror_attacks_currency' => $request->cover_terror_attacks_currency,
            'cover_terror_attacks_insured_currency' => $request->cover_terror_attacks_insured_currency,
            'coverage_evacuation_currency' => $request->coverage_evacuation_currency,
            'driver_quantity' => $request->driver_quantity,
            'driver_currency' => $request->driver_currency,
            'passenger_currency' => $request->passenger_currency,
            'limit_currency' => $request->limit_currency,
            'total_liability_limit_currency_0' => $request->total_liability_limit_currency_0,
            'agent' => $request->agent,
            'payment' => $request->payment,
            'payment_order' => $request->payment_order,
            'payment_term' => $request->payment_term,
            'polis_series' => $request->polis_series,
            'litso' => $request->litso,
        ]);
        return redirect()->back()->with('success', 'Property Lising Zalog added!');
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
