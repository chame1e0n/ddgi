<?php

namespace App\Http\Controllers\Product;

use App\AllProduct;
use App\AllProductInformation;
use App\AllProductInformationTransport;
use App\AllProductsTermsTransh;
use App\Bonded;
use App\BondedPolicyInformation;
use App\Http\Controllers\Controller;
use App\Models\Dogovor;
use App\Models\Policy;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Product;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use App\User;
use App\Zaemshik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Symfony\Component\Console\Input\Input;

/**
 * Class AvtocreditController
 * @package App\Http\Controllers\Product
 */
class AvtocreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('products.about-tamojenniy-sklad.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agent::query()->get();
        return view('products.credit.avtocredit.create', compact('agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

                // zaemshik
//              'fio_insured'=> 'required',
//              'address_beneficiary'=> 'required',
//              'tel_beneficiary'=> 'required',
//              'passport_series'=> 'required',
//              'passport_number'=> 'required',
//              'beneficiary_schet'=> 'required',
//              'inn_beneficiary'=> 'required',
//              'mfo_beneficiary'=> 'required',
//              'bank_beneficiary'=> 'required',
//              'oked_beneficiary'=> 'required',

                // all_product_information
//            'policy_series' => 'required',
//            'policy_insurance_from' => 'required',
//            'otvet_litso' => 'required',


                // all_products
//            'dogovor_lizing_num' => 'required',
//            'credit_from' => 'required',
//            'credit_to' => 'required',
//            'sum_of_credit' => 'required',
//            'insurance_from' => 'required',
//            'insurance_to' => 'required',
//            'credit_franchise' => 'required',
//            'currency_of_settlement' => 'required',

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

//        dd($request);
        $policyHolder = PolicyHolder::create(
            [
                'FIO' => $request->fio_insurer,
                'address' => $request->address_insurer,
                'phone_number' => $request->phone_insurer,
                'checking_account' => $request->address_schet,
                'inn' => $request->inn_insurer,
                'mfo' => $request->mfo_insurer,
                'bank_id' => $request->bank_insurer,
                'oked' => $request->oked_insurer,
            ]
        );

        $zaemshik = Zaemshik::create(
            [
                'z_fio' => $request->fio_beneficiary,
                'z_address' => $request->address_beneficiary,
                'z_phone' => $request->tel_beneficiary,
                'passport_series' => $request->passport_series,
                'passport_number' => $request->passport_number,
                'z_checking_account' => $request->beneficiary_schet,
                'z_inn' => $request->inn_beneficiary,
                'z_mfo' => $request->mfo_beneficiary,
                'bank_id' => $request->bank_beneficiary,
                'z_oked' => $request->oked_beneficiary
            ]
        );

        if (!empty($request->application_form_file)) {
            $application_form_file_path = $request->application_form_file->store("documents_avtocredit");
        } else {
            $application_form_file_path = null;
        }
        if (!empty($request->contract_file)) {
            $contract_file_path = $request->contract_file->store("documents_avtocredit");
        } else {
            $contract_file_path = null;
        }
        if (!empty($request->policy_file)) {
            $policy_file_path = $request->policy_file->store("documents_avtocredit");
        } else {
            $policy_file_path = null;
        }

        $all_product = AllProduct::create(
            [
                'policy_holder_id' => $policyHolder->id,
                'zaemshik_id' => $zaemshik->id,
                'dogovor_lizing_num' => $request->dogovor_lizing_num,
                'credit_from' => $request->credit_from,
                'credit_to' => $request->credit_to,
                'sum_of_credit' => $request->sum_of_credit,
                'insurance_from' => $request->insurance_from,
                'insurance_until' => $request->insurance_until,
                'credit_franchise' => $request->credit_franchise,
                'currency_of_settlement' => $request->currency_of_settlement,


                'insurance_sum' => $request->insurance_sum,
                'insurance_bonus' => $request->insurance_bonus,
                'franchise' => $request->franchise,
                'insurance_premium_currency' => $request->insurance_premium_currency,
                'payment_term' => $request->payment_term,
                'way_of_calculation' => $request->way_of_calculation,
                "payment_sum_main" => $request->payment_sum_main,
                "payment_from_main" => $request->payment_from_main,
                "tariff" => $request->tarif,
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



        for ($x = 0; $x < count($request->mark_model); $x++) {
            $all_product_info = AllProductInformation::create(
                [
                    'all_products_id' => $all_product->id,
                    'polis_number' => $request->polis_number[$x],
                    'god_vipuska' => $request->god_vipuska[$x],
                    'data_vidachi' => $request->data_vidachi[$x],
                    'mark' => $request->mark[$x],
                    'model' => $request->model[$x],
                    'gos_nomer' => $request->gos_nomer[$x],
                    'nomer_teh_pasporta' => $request->nomer_teh_pasporta[$x],
                    'nomer_dvigatelya' => $request->nomer_dvigatelya[$x],
                    'nomer_kuzova' => $request->nomer_kuzova[$x],
                    'strah_stoimost' => $request->strah_stoimost[$x],
                    'strah_summa' => $request->strah_summa[$x],
                    'strah_premiya' => $request->strah_premiya[$x],


                    'mark_model' => $request->mark_model[$x],
                    'name' => $request->name[$x],
                    'series_number' => $request->series_number[$x],
                    'insurance_sum' => $request->insurance_sum[$x],
                    'cover_terror_attacks_sum' => $request->cover_terror_attacks_sum[$x],
                    'cover_terror_attacks_currency' => $request->cover_terror_attacks_currency[$x],
                    'cover_terror_attacks_insured_sum' => $request->cover_terror_attacks_insured_sum[$x],
                    'cover_terror_attacks_insured_currency' => $request->cover_terror_attacks_insured_currency[$x],
                    'coverage_evacuation_cost' => $request->coverage_evacuation_cost[$x],
                    'coverage_evacuation_currency' => $request->coverage_evacuation_currency[$x],
                    'strtahovka' => $request->strtahovka[$x],
                    'other_insurance_info' => $request->other_insurance_info[$x],
                    'vehicle_damage' => $request->vehicle_damage[$x],
                    'one_sum' => $request->one_sum[$x],
                    'one_premia' => $request->one_premia[$x],
                    'one_franshiza' => $request->one_franshiza[$x],
                    'civil_liability' => $request->civil_liability[$x],
                    'tho_sum' => $request->tho_sum[$x],
                    'two_preim' => $request->two_preim[$x],
                    'accidents' => $request->accidents[$x],
                    'driver_quantity' => $request->driver_quantity[$x],
                    'driver_one_sum' => $request->driver_one_sum[$x],
                    'driver_currency' => $request->driver_currency[$x],
                    'driver_total_sum' => $request->driver_total_sum[$x],
                    'driver_preim_sum' => $request->driver_preim_sum[$x],
                    'passenger_quantity' => $request->passenger_quantity[$x],
                    'passenger_one_sum' => $request->passenger_one_sum[$x],
                    'passenger_currency' => $request->passenger_currency[$x],
                    'passenger_total_sum' => $request->passenger_total_sum[$x],
                    'passenger_preim_sum' => $request->passenger_preim_sum[$x],
                    'limit_one_sum' => $request->limit_one_sum[$x],
                    'limit_currency' => $request->limit_currency[$x],
                    'limit_total_sum' => $request->limit_total_sum[$x],
                    'limit_preim_sum' => $request->limit_preim_sum[$x],
                ]
            );
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
            'zaemshik',
            'allProductCurrencyTerms',
            'allProductInfo'
        )->findOrFail($id);
        return view('products.credit.avtocredit.edit', compact('agents', 'all_product'));
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
        $zaemshik = Zaemshik::query()->find($all_product->zaemshik_id);
        $currency_terms_transh = AllProductsTermsTransh::query()->where('all_products_id', $all_product->id)->first();
        $all_product_info = AllProductInformation::query()->where('all_products_id', $all_product->id)->first();

        $policyHolder->update(
            [
                'FIO' => $request->fio_insurer,
                'address' => $request->address_insurer,
                'phone_number' => $request->phone_insurer,
                'checking_account' => $request->address_schet,
                'inn' => $request->inn_insurer,
                'mfo' => $request->mfo_insurer,
                'bank_id' => $request->bank_insurer,
                'oked' => $request->oked_insurer,
            ]
        );

        $zaemshik->update(
            [
                'z_fio' => $request->fio_beneficiary,
                'z_address' => $request->address_beneficiary,
                'z_phone' => $request->tel_beneficiary,
                'passport_series' => $request->passport_series,
                'passport_number' => $request->passport_number,
                'z_checking_account' => $request->beneficiary_schet,
                'z_inn' => $request->inn_beneficiary,
                'z_mfo' => $request->mfo_beneficiary,
                'bank_id' => $request->bank_beneficiary,
                'z_oked' => $request->oked_beneficiary
            ]
        );

        if (!empty($request->application_form_file)) {
            Storage::delete($all_product->application_form_file_path);
            $application_form_file_path = $request->application_form_file->store("documents_avtocredit");
        } else {
            $application_form_file_path = $all_product->application_form_file;
        }
        if (!empty($request->contract_file)) {
            Storage::delete($all_product->contract_file_path);
            $contract_file_path = $request->contract_file->store("documents_avtocredit");
        } else {
            $contract_file_path = $all_product->contract_file;
        }
        if (!empty($request->policy_file)) {
            Storage::delete($all_product->policy_file_path);
            $policy_file_path = $request->policy_file->store("documents_avtocredit");
        } else {
            $policy_file_path = $all_product->policy_file;
        }

        $all_product->update(
            [
                'policy_holder_id' => $policyHolder->id,
                'zaemshik_id' => $zaemshik->id,
                'dogovor_lizing_num' => $request->dogovor_lizing_num,
                'credit_from' => $request->credit_from,
                'credit_to' => $request->credit_to,
                'sum_of_credit' => $request->sum_of_credit,
                'insurance_from' => $request->insurance_from,
                'insurance_until' => $request->insurance_until,
                'credit_franchise' => $request->credit_franchise,
                'currency_of_settlement' => $request->currency_of_settlement,


                'insurance_sum' => $request->insurance_sum,
                'insurance_bonus' => $request->insurance_bonus,
                'franchise' => $request->franchise,
                'insurance_premium_currency' => $request->insurance_premium_currency,
                'payment_term' => $request->payment_term,
                'way_of_calculation' => $request->way_of_calculation,
                "payment_sum_main" => $request->payment_sum_main,
                "payment_from_main" => $request->payment_from_main,
                "tariff" => $request->tarif,
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



//        if (!empty($request->payment_sum)){
//            $currency_terms_transh = AllProductsTermsTransh::create(
//                [
//                    'all_products_id' => $all_product->id,
//                    'payment_sum' => $request->payment_sum,
//                    'payment_from' => $request->payment_from
//                ]
//            );
//        }
            $currency_terms_transh->update(
                [
                    'all_products_id' => $all_product->id,
                    'payment_sum' => $request->payment_sum,
                    'payment_from' => $request->payment_from
                ]
            );

        return 'successfully edit';


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
        $policyHolder = PolicyHolder::query()->findOrFail($all_product->policy_holder_id);
        $zaemshik = Zaemshik::query()->find($all_product->zaemshik_id);
        $policyHolder->delete();
        $zaemshik->delete();
        $all_product_info->delete();
        foreach ($currencyTerms as $item) {
            $item->delete();
        }
        $all_product->delete();
        return "success";
    }
}
