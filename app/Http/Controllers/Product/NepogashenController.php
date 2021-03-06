<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class NepogashenController
 * @package App\Http\Controllers\Product
 */
class NepogashenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        return view('products.about-tamojenniy-sklad.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.credit.nepogashen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'fio_insurer' => 'required',
//            'address_insurer' => 'required',
//            'tel_insurer' => 'required',
//            'address_schet' => 'required',
//            'inn_insurer' => 'required',
//            'mfo_insurer' => 'required',
//            'okonh_insurer' => 'required',
//            'bank_insurer' => 'required',
//            'fio_beneficiary' => 'required',
//            'address_beneficiary' => 'required',
//            'tel_beneficiary' => 'required',
//            'beneficiary_schet' => 'required',
//            'inn_beneficiary' => 'required',
//            'mfo_beneficiary' => 'required',
//            'okonh_beneficiary' => 'required',
//            'bank_beneficiary' => 'required',
//            'client_type_radio' => 'required',
//            'product_id' => 'required',
//            'insurance_premium_payment_type' => 'required',
//            'insurance_premium_currency' => 'required',
//            'insurance_from' => 'required',
//            'insurance_to' => 'required',
//            'volume' => 'required',
//            'volume_measure' => 'required',
//            'total_price' => 'required',
//            'stock_date' => 'required',
//            'total_insured_price' => 'required',
//            'total_insured_closed_stock_price' => 'required',
//            'total_insured_open_stock_price' => 'required',
//            'insurance_premium' => 'required',
//            'settlement_currency' => 'required',
//            'litso' => 'required',
//            'from_date_info' => 'required',
//        ]);
//
//        $policy = Policy::where('policy_series_id', $request->policy_series_id)->where('status', '<>', 'in_use')->first();
//
//        if (empty($policy)) {
//            $policySeries = PolicySeries::find( $request->policy_series_id);
//
//            return back()->withInput()->withErrors([
//                sprintf('?? ???????? ???????????????????? ?????????? ???????????? ??????????: %s', $policySeries->code)
//            ]);
//        }
//
//        $policyHolder = PolicyHolder::create([
//            'FIO' => $request->fio_insurer,
//            'address' => $request->address_insurer,
//            'phone_number' => $request->tel_insurer,
//            'checking_account' => $request->address_schet,
//            'inn' => $request->inn_insurer,
//            'mfo' => $request->mfo_insurer,
//            'okonx' => $request->okonh_insurer,
//            'bank_id' => $request->bank_insurer,
//        ]);
//
//        $policyBeneficiaries = PolicyBeneficiaries::create([
//            'FIO' => $request->fio_beneficiary,
//            'address' => $request->address_beneficiary,
//            'phone_number' => $request->tel_beneficiary,
//            'checking_account' => $request->beneficiary_schet,
//            'inn' => $request->inn_beneficiary,
//            'mfo' => $request->mfo_beneficiary,
//            'okonx' => $request->okonh_beneficiary,
//            'bank_id' => $request->bank_beneficiary,
//        ]);
//
//        $insurance_premium_currency_rate = null;
//
//        if ($request->insurance_premium_currency != 'UZS') {
//            $jsonurl = 'https://cbu.uz/ru/arkhiv-kursov-valyut/json';
//            $json = file_get_contents($jsonurl);
//            $json = json_decode($json);
//
//            foreach ($json as $data) {
//                if ($data->Ccy == $request->insurance_premium_currency) {
//                    $insurance_premium_currency_rate = $data->Rate;
//                }
//            }
//        }
//
//        $bonded = Bonded::create([
//            'type' => $request->client_type_radio,
//            'product_id' => (int)$request->product_id,
//            'insurance_premium_payment_type' => (int)$request->insurance_premium_payment_type,
//            'insurance_premium_currency_rate' => $insurance_premium_currency_rate,
//            'insurance_premium_currency' => $request->insurance_premium_currency,
//            'policy_beneficiary_id' => $policyBeneficiaries->id,
//            'policy_holder_id' => $policyHolder->id,
//            'from_date' => $request->insurance_from,
//            'to_date' => $request->insurance_to,
//            'volume' => $request->volume,
//            'volume_measure' => $request->volume_measure,
//            'total_price' => $request->total_price,
//            'stock_date' => $request->stock_date,
//            'total_insured_price' => $request->total_insured_price,
//            'total_insured_closed_stock_price' => $request->total_insured_closed_stock_price,
//            'total_insured_open_stock_price' => $request->total_insured_open_stock_price,
//            'insurance_premium' => $request->insurance_premium,
//            'settlement_currency' => $request->settlement_currency,
//            'premium_terms' => $request->premium_terms,
//        ]);
//
//        $policy->update([
//            'status' => 'in_use',
//            'client_type' => $request->client_type_radio,
//            ]);
//
//        $brancId = User::find($request->litso)->branch_id;
//        $uniqueNumber = new Dogovor;
//        $uniqueNumber = $uniqueNumber->createUniqueNumber(
//            $brancId,
//            $request->insurance_premium_payment_type,
//            2,
//            'bonded',
//            $bonded->id
//        );
//
//        $bonded->update([
//            'unique_number' => $uniqueNumber
//        ]);
//
//        BondedPolicyInformation::create([
//            'bonded_id' => $bonded->id,
//            'policy_series_id' => $request->policy_series_id,
//            'policy_id' => $policy->id,
//            'user_id' => $request->litso,
//            'from_date' => $request->from_date_info,
//        ]);
//
//        return redirect()->route('all_products.index')
//            ->with('success','?????????????? ???????????????? ??????????????');
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param $id
//     * @return void
//     */
//    public function show($id)
//    {
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param Bonded $product
//     * @return void
//     */
//    public function edit($id)
//    {
//        $bonded = Bonded::find($id);
//        $agents = Agent::all();
//        $policySeries = PolicySeries::all();
//        $banks = Bank::all();
//        return view('products.about-tamojenniy-sklad.edit', compact('bonded', 'agents', 'policySeries', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
//        $bonded = Bonded::find($id);
//        $bonded->policyHolder->update([
//            'FIO' => $request->fio_insurer,
//            'address' => $request->address_insurer,
//            'phone_number' => $request->tel_insurer,
//            'checking_account' => $request->address_schet,
//            'inn' => $request->inn_insurer,
//            'mfo' => $request->mfo_insurer,
//            'okonx' => $request->okonh_insurer,
//            'bank_id' => $request->bank_insurer,
//        ]);
//
//        $bonded->policyBeneficiaries->update([
//            'FIO' => $request->fio_beneficiary,
//            'address' => $request->address_beneficiary,
//            'phone_number' => $request->tel_beneficiary,
//            'checking_account' => $request->beneficiary_schet,
//            'inn' => $request->inn_beneficiary,
//            'mfo' => $request->mfo_beneficiary,
//            'okonx' => $request->okonh_beneficiary,
//            'bank_id' => $request->bank_beneficiary,
//        ]);
//        $bonded->update([
//            'from_date' => $request->insurance_from,
//            'to_date' => $request->insurance_to,
//            'volume' => $request->volume,
//            'volume_measure' => $request->volume_measure,
//            'total_price' => $request->total_price,
//            'stock_date' => $request->stock_date,
//            'total_insured_price' => $request->total_insured_price,
//            'total_insured_closed_stock_price' => $request->total_insured_closed_stock_price,
//            'total_insured_open_stock_price' => $request->total_insured_open_stock_price,
//            'insurance_premium' => $request->insurance_premium,
//            'settlement_currency' => $request->settlement_currency,
//            'premium_terms' => $request->premium_terms,
//        ]);
//
//        $bonded->policyInformations->update([
//            'bonded_id' => $bonded->id,
//            'policy_series_id' => $request->policy_series_id,
//            'user_id' => $request->litso,
//            'from_date' => $request->from_date_info,
//        ]);
//
//        return redirect()->back()->with('success', '?????????????? ???????????????????????? ????????????');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
//        $bonded = Bonded::find($id);
//        $bonded->policyInformations->delete();
//        $bonded->delete();
//
//        return redirect()->route('all_products.index')
//            ->with('success', sprintf('???????????? ?? ???????????????? ???????? ?????????????? ??????????????', $bonded->unique_number));
    }
}
