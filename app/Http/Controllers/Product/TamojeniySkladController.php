<?php

namespace App\Http\Controllers\Product;

use App\Bonded;
use App\BondedPolicyInformation;
use App\Http\Controllers\Controller;
use App\Models\Policy;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Product;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

/**
 * Class TamojeniySkladController
 * @package App\Http\Controllers\Product
 */
class TamojeniySkladController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.about-tamojenniy-sklad.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::all();
        $policySeries = PolicySeries::all();
        $banks = Bank::all();
        return view('products.about-tamojenniy-sklad.create', compact('agents', 'policySeries', 'banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        $policyBeneficiaries = PolicyBeneficiaries::create([
            'FIO' => $request->fio_beneficiary,
            'address' => $request->address_beneficiary,
            'phone_number' => $request->tel_beneficiary,
            'checking_account' => $request->beneficiary_schet,
            'inn' => $request->inn_beneficiary,
            'mfo' => $request->mfo_beneficiary,
            'okonx' => $request->okonh_beneficiary,
            'bank_id' => $request->bank_beneficiary,
        ]);
        $bonded = Bonded::create([
            'type' => $request->client_type_radio,
            'product_id' => (int)$request->product_id,
            'policy_beneficiary_id' => $policyBeneficiaries->id,
            'policy_holder_id' => $policyHolder->id,
            'from_date' => $request->insurance_from,
            'to_date' => $request->insurance_to,
            'volume' => $request->volume,
            'volume_measure' => $request->volume_measure,
            'total_price' => $request->total_price,
            'stock_date' => $request->stock_date,
            'total_insured_price' => $request->stock_date,
            'total_insured_closed_stock_price' => $request->total_insured_closed_stock_price,
            'total_insured_open_stock_price' => $request->total_insured_open_stock_price,
            'insurance_premium' => $request->insurance_premium,
            'settlement_currency' => $request->settlement_currency,
            'premium_terms' => $request->premium_terms,
        ]);

        BondedPolicyInformation::create([
            'bonded_id' => $bonded->id,
            'policy_series_id' => $request->policy_series_id,
            'user_id' => $request->litso,
            'from_date' => $request->from_date_info,
        ]);
        dd($request->all());
        return redirect()->back()->with('success','Успешно распределены полюсы');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return void
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
