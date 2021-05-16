<?php

namespace App\Http\Controllers\Product;

use App\AllProduct;
use App\AllProductInformation;
use App\AllProductsTermsTransh;
use App\Http\Controllers\Controller;
use App\Http\Requests\OtvetstvennostPodryadchikRequest;
use App\Models\Dogovor;
use App\Models\Policy;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Product\OtvetstvennostPodryadchik;
use App\Models\Product\OtvetstvennostPodryadchikStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class OtvetstvennostPodryadchikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $policySeries = PolicySeries::all();
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.otvetstvennost.podryadchik.create', compact('banks', 'agents', 'policySeries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//        $policy = Policy::where('policy_series_id', $request->serial_number_policy)->where('status', '<>', 'in_use')->first();
//
//        if (empty($policy)) {
//            $policySeries = PolicySeries::find($request->serial_number_policy);
//
//            return back()->withInput()->withErrors([
//                sprintf('В базе отсутсвует полюс данной серии: %s', $policySeries->code)
//            ]);
//        }
//        $newPolicyHolders = PolicyHolder::createPolicyHolders($request);
//        if (!$newPolicyHolders)
//            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении PolicyHolders')]);
//        $request->policy_holder_id = $newPolicyHolders->id;
//        $newOtvetstvennostPodryadchik = OtvetstvennostPodryadchik::createOtvetstvennostPodryadchik($request);
//        if (!$newOtvetstvennostPodryadchik)
//            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении OtvetstvennostPodryadchik')]);
//
//        $policy->update([
//            'status' => 'in_use',
//            'client_type' => $request->client_type_radio,
//        ]);
//
//        $brancId = User::find($request->litso)->branch_id;
//        $uniqueNumber = new Dogovor;
//        $uniqueNumber = $uniqueNumber->createUniqueNumber(
//            $brancId,
//            $request->insurance_premium_payment_type,
//            4,
//            'otvetstvennost_podryadchiks',
//            $newOtvetstvennostPodryadchik->id
//        );
//
//        $newOtvetstvennostPodryadchik->update([
//            'unique_number' => $uniqueNumber,
//            'policy_id' => $policy->id
//        ]);
//
//        if (!empty($request->post('payment_sum')) && !empty($request->post('payment_sum'))) {
//            $i = 0;
//            foreach ($request->post('payment_sum') as $sum) {
//                if ($sum != null && $request->post('payment_from')[$i] != null) {
//                    $newStrahPremiya = OtvetstvennostPodryadchikStrahPremiya::create([
//                        'prem_sum' => $sum,
//                        'prem_from' => $request->post('payment_from')[$i],
//                        'otvetstvennost_podryadchik_id' => $newOtvetstvennostPodryadchik->id
//                    ]);
//                }
//                $i++;
//            }
//        }

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

        $policyHolder = PolicyHolder::create([
            'FIO' => $request->fio_insurer,
            'address' => $request->address_insurer,
            'phone_number' => $request->phone_insurer,
            'checking_account' => $request->payment_bill,
            'inn' => $request->inn_insurer,
            'mfo' => $request->mfo_insurer,
            'oked' => $request->oked_insurer,
            'okonx' => $request->okonh_insurer,
            'bank_id' => $request->bank_insurer
        ]);

        $policyBeneficiaries = PolicyBeneficiaries::create([
            'FIO' => $request->fio_beneficiary,
            'address' => $request->address_beneficiary,
            'phone_number' => $request->tel_beneficiary,
            'checking_account' => $request->beneficiary_bill,
            'mfo' => $request->mfo_beneficiary,
            'bank_id' => $request->bank_beneficiary,
            'inn' => $request->inn_beneficiary,
            'oked' => $request->oked_beneficiary,
        ]);

        if (!empty($request->application_form_file)) {
            $application_form_file_path = $request->application_form_file->store("documents_podraydchik");
        } else {
            $application_form_file_path = null;
        }
        if (!empty($request->contract_file)) {
            $contract_file_path = $request->contract_file->store("documents_podraydchik");
        } else {
            $contract_file_path = null;
        }
        if (!empty($request->policy_file)) {
            $policy_file_path = $request->policy_file->store("documents_podraydchik");
        } else {
            $policy_file_path = null;
        }
        if (!empty($request->contract_agreement)) {
            $contract_agreement_file_path = $request->contract_agreement->store("documents_podraydchik");
        } else {
            $contract_agreement_file_path = null;
        }

        $all_product = AllProduct::create(
            [
                'policy_holder_id' => $policyHolder->id,
                'policy_beneficiaries_id' => $policyBeneficiaries->id,
                'insurance_date_from' => $request->insurance_date_from,
                'insurance_to' => $request->insurance_to,
                'geo_zone' => $request->geo_zone,
                'contract_agreement' => $contract_agreement_file_path,
                'beneficiary_geo_zone' => $request->beneficiary_geo_zone,
                'construct_object' => $request->construct_object,
                'work_exp' => $request->work_exp,
                'beneficiary_insurance_from' => $request->beneficiary_insurance_from,
                'beneficiary_insurance_to' => $request->beneficiary_insurance_to,
                'geograph_zone' => $request->geograph_zone,


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
        if (!empty($request->payment_sum)) {
            $currency_terms_transh = AllProductsTermsTransh::create(
                [
                    'all_products_id' => $all_product->id,
                    'payment_sum' => $request->payment_sum,
                    'payment_from' => $request->payment_from
                ]
            );
        }

        return "Saved successfully";
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $podryadchik = OtvetstvennostPodryadchik::getInfoPodryadchik($id);
        $policySeries = PolicySeries::all();
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.otvetstvennost.podryadchik.show', compact('banks', 'agents', 'policySeries', 'podryadchik'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $agents = Agent::query()->get();
        $all_product = AllProduct::query()->with(
            'policyHolder',
            'policyBeneficiaries',
            'allProductCurrencyTerms',
            'allProductInfo',
            'allProductInformations'
        )->findOrFail($id);
        return view('products.otvetstvennost.podryadchik.edit', compact('agents', 'all_product'));
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
//        $otvetstvennostPodryadchik = OtvetstvennostPodryadchik::findOrFail($id);
//        $policyHolders = PolicyHolder::updatePolicyHolders($otvetstvennostPodryadchik->policy_holder_id, $request);
//        if (!$policyHolders)
//            return back()->withInput()->withErrors([sprintf('Ошибка при обновлении PolicyHolders')]);
//        $otvetstvennostPodryadchik = OtvetstvennostPodryadchik::updateOtvetstvennostPodryadchik($id, $request);
//        if (!$otvetstvennostPodryadchik)
//            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении PolicyHolders')]);
//        if ($otvetstvennostPodryadchik->payment_term == '1') {
//            $delStrahPremiya = OtvetstvennostPodryadchikStrahPremiya::where('otvetstvennost_podryadchik_id', $otvetstvennostPodryadchik->id)->delete();
//        } else {
//            if (!empty($request->post('payment_sum')) && !empty($request->post('payment_sum'))) {
//                foreach ($request->post('payment_sum') as $key => $sum) {
//                    $newStrahPremiya = OtvetstvennostPodryadchikStrahPremiya::updateOrCreate([
//                        'id' => $key,
//                        'otvetstvennost_podryadchik_id' => $otvetstvennostPodryadchik->id
//                    ], [
//                        'prem_sum' => $sum,
//                        'prem_from' => $request->post('payment_from')[$key]
//                    ]);
//                }
//            }
//        }

        $banks = Bank::query()->get();
        $all_product = AllProduct::query()->find($id);
        $policyHolder = PolicyHolder::query()->find($all_product->policy_holder_id);
        $policyBeneficiaries = PolicyBeneficiaries::query()->find($all_product->policy_beneficiaries_id);
        $currency_terms_transh = AllProductsTermsTransh::query()->where('all_products_id', $all_product->id)->first();
        $all_product_info = AllProductInformation::query()->where('all_products_id', $all_product->id)->first();

        $policyHolder->update([
            'FIO' => $request->fio_insurer,
            'address' => $request->address_insurer,
            'phone_number' => $request->phone_insurer,
            'checking_account' => $request->payment_bill,
            'inn' => $request->inn_insurer,
            'mfo' => $request->mfo_insurer,
            'oked' => $request->oked_insurer,
            'okonx' => $request->okonh_insurer,
            'bank_id' => $request->bank_insurer
        ]);

        $policyBeneficiaries->update([
            'FIO' => $request->fio_beneficiary,
            'address' => $request->address_beneficiary,
            'phone_number' => $request->tel_beneficiary,
            'checking_account' => $request->beneficiary_bill,
            'mfo' => $request->mfo_beneficiary,
            'bank_id' => $request->bank_beneficiary,
            'inn' => $request->inn_beneficiary,
            'oked' => $request->oked_beneficiary,
        ]);

        if (!empty($request->application_form_file)) {
            Storage::delete($all_product->application_form_file_path);
            $application_form_file_path = $request->application_form_file->store("documents_podraydchik");
        } else {
            $application_form_file_path = $all_product->application_form_file;
        }
        if (!empty($request->contract_file)) {
            Storage::delete($all_product->contract_file_path);
            $contract_file_path = $request->contract_file->store("documents_podraydchik");
        } else {
            $contract_file_path = $all_product->contract_file;
        }
        if (!empty($request->policy_file)) {
            Storage::delete($all_product->policy_file_path);
            $policy_file_path = $request->policy_file->store("documents_podraydchik");
        } else {
            $policy_file_path = $all_product->policy_file;
        }

        if (!empty($request->contract_agreement)) {
            Storage::delete($all_product->contract_agreement_file_path);
            $contract_agreement_file_path = $request->contract_agreement->store("documents_podraydchik");
        } else {
            $contract_agreement_file_path = $all_product->contract_agreement;
        }

        $all_product->update(
            [
                'policy_holder_id' => $policyHolder->id,
                'policy_beneficiaries_id' => $policyBeneficiaries->id,
                'insurance_date_from' => $request->insurance_date_from,
                'insurance_to' => $request->insurance_to,
                'geo_zone' => $request->geo_zone,
                'contract_agreement' => $contract_agreement_file_path,
                'beneficiary_geo_zone' => $request->beneficiary_geo_zone,
                'construct_object' => $request->construct_object,
                'work_exp' => $request->work_exp,
                'beneficiary_insurance_from' => $request->beneficiary_insurance_from,
                'beneficiary_insurance_to' => $request->beneficiary_insurance_to,
                'geograph_zone' => $request->geograph_zone,


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
            $all_product_info->update(
                [
                    'all_products_id' => $all_product->id,
                    'policy_series' => $request->policy_series,
                    'policy_insurance_from' => $request->policy_insurance_from,
                    'otvet_litso' => $request->litso,
                ]
            );
        }

//        if (!empty(AllProductsTermsTransh::where('payment_sum', '!=', null))) {
//            $currency_terms_transh->update(
//                [
//                    'all_products_id' => $all_product->id,
//                    'payment_sum' => $request->input('payment_sum'),
//                    'payment_from' => $request->input('payment_from')
//                ]
//            );
//        }else{
            $currency_terms_transh = AllProductsTermsTransh::create(
                [
                    'all_products_id' => $all_product->id,
                    'payment_sum' => $request->payment_sum,
                    'payment_from' => $request->payment_from
                ]
            );
//        }

        return "Данные успешно обновлены";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $all_product = AllProduct::query()->findOrFail($id);

        $currencyTerms = AllProductsTermsTransh::query()->where('all_products_id', $all_product->id)->get();
        $all_product_info = AllProductInformation::query()->where('all_products_id', $all_product->id)->first();
        $policyHolder = PolicyHolder::query()->findOrFail($all_product->policy_holder_id);
        $policyBeneficiaries = PolicyBeneficiaries::query()->find($all_product->policy_beneficiaries_id);
        $policyHolder->delete();
        $policyBeneficiaries->delete();
        $all_product_info->delete();
        foreach ($currencyTerms as $item) {
            $item->delete();
        }
        $all_product->delete();
        return "success";
    }
}
