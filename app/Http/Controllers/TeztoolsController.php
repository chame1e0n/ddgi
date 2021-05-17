<?php

namespace App\Http\Controllers;

use App\AllProduct;
use App\AllProductInformation;
use App\AllProductInformationTransport;
use App\AllProductsTermsTransh;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeztoolsController extends Controller
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
        $agents = Agent::query()->get();
        return view('products.avto.teztools.create', compact('agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $request->validate(
            [
                // policy_holders
//            'fio_insurer' => 'required',
//            'address_insurer' => 'required',
//            'tel_insurer' => 'required',
//            'address_schet' => 'required',
//            'inn_insurer' => 'required',
//            'mfo_insurer' => 'required',
//            'bank_insurer' => 'required',
//            'oked_insurer' => 'required',

                //beneficiary
//              'fio_beneficiary'=> 'required',
//              'address_beneficiary'=> 'required',
//              'tel_beneficiary'=> 'required',
//              'beneficiary_schet'=> 'required',
//              'inn_beneficiary'=> 'required',
//              'mfo_beneficiary'=> 'required',
//              'bank_id'=> 'required',
//              'oked_beneficiary'=> 'required',
//              'nomer_passport'=> 'required',
//              'okonh_beneficiary'=> 'required',
//              'okonh_beneficiary'=> 'required',

                // all_product_information
//            'policy_series' => 'required',
//            'policy_insurance_from' => 'required',
//            'otvet_litso' => 'required',


                // all_products
//
//            'insurance_sum' => 'required',
//            'insurance_bonus'=> 'required',
//            'franchise'=> 'required',
//            'insurance_premium_currency'=> 'required',
//            'payment_term'=> 'required',
//            'way_of_calculation'=> 'required',
//            'application_form_file'=> 'required',
//            'contract_file'=> 'required',
//            'policy_file'=> 'required',
            ]
        );

//        if ($request->get('payment_term') === "transh") {
//            $request->validate([
//                "payment_sum_main" => "required",
//                "payment_from_main" => "required"
//            ]);
//        }

//        if ($request->tariff === 'tariff') {
//            $request->validate([
//                'tariff_other' => 'required'
//            ]);
//        }
//
//        if ($request->preim === 'preim') {
//            $request->validate([
//                'premiya_other' => 'required'
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
            'FIO' => $request->fio_beneficiary,
            'address' => $request->address_beneficiary,
            'phone_number' => $request->tel_beneficiary,
            'checking_account' => $request->beneficiary_schet,
            'inn' => $request->inn_beneficiary,
            'mfo' => $request->mfo_beneficiary,
            'oked' => $request->oked_beneficiary,
            'nomer_passport' => $request->nomer_passport,
            'bank_id' => $request->bank_beneficiary,
            'okonx' => $request->okonh_beneficiary,
            'seria_passport' => $request->seria_passport,
        ]);

        if (!empty($request->application_form_file)) {
            $application_form_file_path = $request->application_form_file->store("documents_teztools");
        } else {
            $application_form_file_path = null;
        }
        if (!empty($request->contract_file)) {
            $contract_file_path = $request->contract_file->store("documents_teztools");
        } else {
            $contract_file_path = null;
        }
        if (!empty($request->policy_file)) {
            $policy_file_path = $request->policy_file->store("documents_teztools");
        } else {
            $policy_file_path = null;
        }


        $all_product = AllProduct::create(
            [
                'policy_holder_id' => $policyHolder->id,
                'policy_beneficiaries_id' => $policyBeneficiaries->id,
                'insurance_from' => $request->insurance_from,
                'insurance_to' => $request->insurance_to,
                'using_tc' => $request->using_tc,
                'geo_zone' => $request->geo_zone,
                'insurance_sum' => $request->insurance_sum,
                'insurance_bonus' => $request->insurance_bonus,
                'franchise' => $request->franchise,
                'insurance_premium_currency' => $request->insurance_premium_currency,
                'payment_term' => $request->payment_term,
                'way_of_calculation' => $request->way_of_calculation,
                "payment_sum_main" => $request->payment_sum_main,
                "payment_from_main" => $request->payment_from_main,
                "tariff" => $request->tariff,
                "tarif_other" => $request->tariff_other,
                "preim" => $request->preim,
                "premiya_other" => $request->premiya_other,
                'application_form_file' => $application_form_file_path,
                'contract_file' => $contract_file_path,
                'policy_file' => $policy_file_path,
            ]
        );

        if (!empty($request->policy_series)) {
            $all_product_info = AllProductInformation::create(
                [
                    'all_products_id' => $all_product->id,
                    'policy_series' => $request->policy_series,
                    'policy_insurance_from' => $request->policy_insurance_from,
                    'otvet_litso' => $request->litso,
                ]
            );
        }
        if (!empty($request->polis_mark)){
            $all_product_info_transport = AllProductInformationTransport::create([
                'all_products_id' => $all_product->id,
                'polis_mark'=>$request->polis_mark,
                'polis_model'=>$request->polis_model,
                'polis_gos_num'=>$request->polis_gos_num,
                'polis_teh_passport'=>$request->polis_teh_passport,
                'polis_num_engine'=>$request->polis_num_engine,
                'agents'=>$request->agents,
                'polis_payload'=>$request->polis_payload,
                'modification'=>$request->modification,
                'state_num'=>$request->state_num,
                'num_tech_passport'=>$request->num_tech_passport,
                'num_engine'=>$request->num_engine,
                'num_carcase'=>$request->num_carcase,
                'carrying_capacity'=>$request->carrying_capacity,
                'insurance_cost'=>$request->insurance_cost,
                'overall_polis_sum'=>$request->overall_polis_sum,
                'polis_premium'=>$request->polis_premium,
            ]);
        }

        if (!empty($request->payment_sum)){
            $currency_terms_transh = AllProductsTermsTransh::create(
                [
                    'all_products_id' => $all_product->id,
                    'payment_sum' => $request->payment_sum,
                    'payment_from' => $request->payment_from
                ]
            );
        }

        return 'successfully created!';

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agents = Agent::query()->get();
        $all_product = AllProduct::query()->with(
            'policyHolder',
            'policyBeneficiaries',
            'allProductCurrencyTerms',
            'allProductInfo',
            'allProductInfoTransport'
        )->findOrFail($id);
        return view('products.avto.teztools.edit', compact('agents', 'all_product'));
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
        $banks = Bank::query()->get();
        $all_product = AllProduct::query()->find($id);
        $policyHolder = PolicyHolder::query()->find($all_product->policy_holder_id);
        $policyBeneficiaries = PolicyBeneficiaries::query()->find($all_product->policy_beneficiaries_id);
        $currency_terms_transh = AllProductsTermsTransh::query()->where('all_products_id', $all_product->id)->first();
        $all_product_info = AllProductInformation::query()->where('all_products_id', $all_product->id)->first();
        $all_product_info_transport = AllProductInformationTransport::query()->where('all_products_id', $all_product->id)->first();

        $policyHolder->update(
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

        $policyBeneficiaries->update([
            'FIO' => $request->fio_beneficiary,
            'address' => $request->address_beneficiary,
            'phone_number' => $request->tel_beneficiary,
            'checking_account' => $request->beneficiary_schet,
            'inn' => $request->inn_beneficiary,
            'mfo' => $request->mfo_beneficiary,
            'oked' => $request->oked_beneficiary,
            'nomer_passport' => $request->nomer_passport,
            'bank_id' => $request->bank_beneficiary,
            'okonx' => $request->okonh_beneficiary,
            'seria_passport' => $request->seria_passport,
        ]);

        if (!empty($request->application_form_file)) {
            Storage::delete($all_product->application_form_file_path);
            $application_form_file_path = $request->application_form_file->store("documents_teztools");
        } else {
            $application_form_file_path = $all_product->application_form_file;
        }
        if (!empty($request->contract_file)) {
            Storage::delete($all_product->contract_file_path);
            $contract_file_path = $request->contract_file->store("documents_teztools");
        } else {
            $contract_file_path = $all_product->contract_file;
        }
        if (!empty($request->policy_file)) {
            Storage::delete($all_product->policy_file_path);
            $policy_file_path = $request->policy_file->store("documents_teztools");
        } else {
            $policy_file_path = $all_product->policy_file;
        }

        $all_product->update(
            [
                'policy_holder_id' => $policyHolder->id,
                'policy_beneficiaries_id' => $policyBeneficiaries->id,
                'insurance_from' => $request->insurance_from,
                'insurance_to' => $request->insurance_to,
                'using_tc' => $request->using_tc,
                'geo_zone' => $request->geo_zone,
                'insurance_sum' => $request->insurance_sum,
                'insurance_bonus' => $request->insurance_bonus,
                'franchise' => $request->franchise,
                'insurance_premium_currency' => $request->insurance_premium_currency,
                'payment_term' => $request->payment_term,
                'way_of_calculation' => $request->way_of_calculation,
                "payment_sum_main" => $request->payment_sum_main,
                "payment_from_main" => $request->payment_from_main,
                "tariff" => $request->tariff,
                "tarif_other" => $request->tariff_other,
                "preim" => $request->preim,
                "premiya_other" => $request->premiya_other,
                'application_form_file' => $application_form_file_path,
                'contract_file' => $contract_file_path,
                'policy_file' => $policy_file_path,
            ]
        );

            $all_product_info->update(
                [
                    'all_products_id' => $all_product->id,
                    'policy_series' => $request->policy_series,
                    'policy_insurance_from' => $request->policy_insurance_from,
                    'otvet_litso' => $request->litso,
                ]
            );

        if (!empty($request->polis_mark)){
            $all_product_info_transport->update([
                'all_products_id' => $all_product->id,
                'polis_mark'=>$request->polis_mark,
                'polis_model'=>$request->polis_model,
                'polis_gos_num'=>$request->polis_gos_num,
                'polis_teh_passport'=>$request->polis_teh_passport,
                'polis_num_engine'=>$request->polis_num_engine,
                'agents'=>$request->agents,
                'polis_payload'=>$request->polis_payload,
                'modification'=>$request->modification,
                'state_num'=>$request->state_num,
                'num_tech_passport'=>$request->num_tech_passport,
                'num_engine'=>$request->num_engine,
                'num_carcase'=>$request->num_carcase,
                'carrying_capacity'=>$request->carrying_capacity,
                'insurance_cost'=>$request->insurance_cost,
                'overall_polis_sum'=>$request->overall_polis_sum,
                'polis_premium'=>$request->polis_premium,
            ]);
        }

        if (!empty($request->payment_sum)){
            $currency_terms_transh->update(
                [
                    'all_products_id' => $all_product->id,
                    'payment_sum' => $request->payment_sum,
                    'payment_from' => $request->payment_from
                ]
            );
        }

        return 'successfully edit!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $all_product = AllProduct::query()->findOrFail($id);

        $currencyTerms = AllProductsTermsTransh::query()->where('all_products_id', $all_product->id)->get();
        $all_product_info = AllProductInformation::query()->where('all_products_id', $all_product->id)->first();
        $all_product_info_transport = AllProductInformationTransport::query()->where('all_products_id', $all_product->id)->first();
        $policyHolder = PolicyHolder::query()->findOrFail($all_product->policy_holder_id);
        $policyBeneficiaries = PolicyBeneficiaries::query()->find($all_product->policy_beneficiaries_id);
        $policyHolder->delete();
        $policyBeneficiaries->delete();
        $all_product_info->delete();
        $all_product_info_transport->delete();
        foreach ($currencyTerms as $item) {
            $item->delete();
        }
        $all_product->delete();
        return "success";
    }
}
