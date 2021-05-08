<?php

namespace App\Http\Controllers\Product;

use App\AllProduct;
use App\AllProductsTermsTransh;
use App\Http\Controllers\Controller;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Product\DobrovolkaAvtoModel;
use App\Models\Spravochniki\Bank;
use Illuminate\Http\Request;

class DobrovolkaAvtoController extends Controller
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

        $banks = Bank::getBanks();

        return view('products.avto.index.create', compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        if ($request->get('payment_term') === "transh") {
//            $request->validate([
//                "payment_sum_main" => "required",
//                "payment_from_main" => "required"
//            ]);
//        }

        $policyHolder = PolicyHolder::create(
            [
                'FIO' => $request->fio_insurer,
                'address' => $request->address_insurer,
                'phone_number' => $request->tel_insurer,
                'checking_account' => $request->address_schet,
                'inn' => $request->inn_insurer,
                'mfo' => $request->mfo_insurer,
                'bank_id' => $request->bank_insurer,
                'oked' => $request->oked_insurer,
                'okonx' => $request->okonh_insurer,
            ]
        );
        $policyBeneficiaries = PolicyBeneficiaries::create([
            'FIO' => $request->FIO,
            'address' => $request->address,
            'seria_passport' => $request->seria_passport,
            'nomer_passport' => $request->nomer_passport,
            'phone_number' => $request->phone_number,
            'checking_account' => $request->checking_account,
            'inn' => $request->inn,
            'mfo' => $request->mfo,
            'bank_id' => $request->bank_beneficiary,
            'oked' => $request->oked_beneficiary,
            'okonx' => $request->okonh_beneficiary,
        ]);

        if (!empty($request->application_form_file)) {
            $application_form_file_path = $request->application_form_file->store("documents_avto");
        } else {
            $application_form_file_path = null;
        }
        if (!empty($request->contract_file)) {
            $contract_file_path = $request->contract_file->store("documents_avto");
        } else {
            $contract_file_path = null;
        }
        if (!empty($request->policy_file)) {
            $policy_file_path = $request->policy_file->store("documents_avto");
        } else {
            $policy_file_path = null;
        }
        if (!empty($request->defects_images)) {
            $defects_images_path = $request->defects_images->store("documents_avto");
        } else {
            $defects_images_path = null;
        }

        $all_product = AllProduct::create(
            [
                'policy_holder_id' => $policyHolder->id,
                'policy_beneficiaries_id' => $policyBeneficiaries->id,
                'object_from_date' => $request->object_from_date,
                'object_to_date' => $request->object_to_date,
                'ispolzovaniya_TS_na_osnovanii' => $request->ispolzovaniya_TS_na_osnovanii,
                'geo_zone' => $request->geo_zone,
                'defects' => $request->defects,
                'defects_images' => $defects_images_path,
                'cel_ispolzovaniya'=> $request->cel_ispolzovaniya,




                'insurance_sum' => $request->insurance_sum,
                'insurance_bonus' => $request->insurance_bonus,
                'franchise' => $request->franchise,
                'insurance_premium_currency' => $request->insurance_premium_currency,
                'payment_term' => $request->payment_term,
                'way_of_calculation' => $request->way_of_calculation,
                "payment_sum_main" => $request->payment_sum_main,
                "payment_from_main" => $request->payment_from_main,
                'application_form_file' => $application_form_file_path,
                'contract_file' => $contract_file_path,
                'policy_file' => $policy_file_path
            ]
        );

        $currency_terms_transh = AllProductsTermsTransh::create(
            [
                'all_products_id' => $all_product->id,
                'payment_sum' => $request->payment_sum,
                'payment_from' => $request->payment_from
            ]
        );

        return 'successfully created!';

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
