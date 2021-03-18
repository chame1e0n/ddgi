<?php

namespace App\Http\Controllers;

use App\Models\LisingProduct;
use Illuminate\Http\Request;

class LisingZalogController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.about-tc-lizing-zalog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LisingProduct::create([
            'client_type_radio' => $request->client_type_radio,
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
            'polis_gos_num_0' => $request->polis_gos_num_0,
            'polis_teh_passport_0' => $request->polis_teh_passport_0,
            'polis_num_engine_0' => $request->polis_num_engine_0,
            'polis_num_body_0' => $request->polis_num_body_0,
            'polis_payload_0' => $request->polis_payload_0,
            'polis_places_0' => $request->polis_places_0,
            'overall_polis_sum_0' => $request->overall_polis_sum_0,
            'polis_premium_0' => $request->polis_premium_0,
            'mark_model' => $request->mark_model,
            'name' => $request->name,
            'series_number' => $request->series_number,
            'insurance_sum' => $request->insurance_sum,
            'total' => $request->total,
            'cover_terror_attacks_sum' => $request->cover_terror_attacks_sum,
            'cover_terror_attacks_currency' => $request->cover_terror_attacks_currency,
            'cover_terror_attacks_insured_sum' => $request->cover_terror_attacks_insured_sum,
            'cover_terror_attacks_insured_currency' => $request->cover_terror_attacks_insured_currency,
            'coverage_evacuation_cost' => $request->coverage_evacuation_cost,
            'coverage_evacuation_currency' => $request->coverage_evacuation_currency,
            'strtahovka_0' => $request->strtahovka_0,
            'other_insurance_info' => $request->other_insurance_info,
            'vehicle_damage' => $request->vehicle_damage,
            'one_sum' => $request->one_sum,
            'one_premia' => $request->one_premia,
            'one_franshiza' => $request->one_franshiza,
            'civil_liability' => $request->civil_liability,
            'tho_sum' => $request->tho_sum,
            'two_preim' => $request->two_preim,
            'accidents' => $request->accidents,
            'driver_quantity' => $request->driver_quantity,
            'driver_one_sum' => $request->driver_one_sum,
            'driver_currency' => $request->driver_currency,
            'driver_total_sum' => $request->driver_total_sum,
            'driver_preim_sum' => $request->driver_preim_sum,
            'passenger_quantity' => $request->passenger_quantity,
            'passenger_one_sum' => $request->passenger_one_sum,
            'passenger_currency' => $request->passenger_currency,
            'passenger_total_sum' => $request->passenger_total_sum,
            'passenger_preim_sum' => $request->passenger_preim_sum,
            'limit_quantity' => $request->limit_quantity,
            'limit_one_sum' => $request->limit_one_sum,
            'limit_currency' => $request->limit_currency,
            'limit_total_sum' => $request->limit_total_sum,
            'limit_preim_sum' => $request->limit_preim_sum,
            'total_liability_limit_0' => $request->total_liability_limit_0,
            'total_liability_limit_currency_0' => $request->total_liability_limit_currency_0,
            'policy' => $request->policy,
            'from_date' => $request->from_date,
            'agent' => $request->agent,
            'payment' => $request->payment,
            'payment_order' => $request->payment_order,
            'insurance_premium_currency' => $request->insurance_premium_currency,
            'payment_term' => $request->payment_term,
            'payment_sum_0_0' => $request->payment_sum_0_0,
            'payment_from_0_0' => $request->payment_from_0_0,
            'polis_series' => $request->polis_series,
            'litso' => $request->litso,
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');
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
