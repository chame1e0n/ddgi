<?php

namespace App\Http\Controllers;

use App\AllProduct;
use App\AllProductInformation;
use App\AllProductsTermsTransh;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Zaemshik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PotrebKreditController extends Controller
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
        return view('credit.potrebkredit_create', compact('agents'));
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
//            'dogovor_num' => 'required',
//            'date_dogovor_strah' => 'required',
//            'credit_dogovor_num' => 'required',
//            'date_kredit_dogovor' => 'required',
//            'loan_sum' => 'required',
//            'term_from' => 'required',
//            'term_to' => 'required',
//            'object_form_date' => 'required',
//            'object_to_date' => 'required',
//            'zalog_vid' => 'required',
//            'loan_reason' => 'required',
//            'tovar_about' => 'required',
//            'zalog_obesp_summ' => 'required',
//            'passport_copy'=>'required',
//            'dogovor_copy'=>'required',
//            'spravka_copy'=>'required',
//            'spravka_rabotaa_copy'=>'required',
//            'other_copy'=>'required',
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
            ]
        );

        $zaemshik = Zaemshik::create(
            [
                'z_fio' => $request->fio_insured,
                'z_address' => $request->address_beneficiary,
                'z_phone' => $request->tel_beneficiary,
                'z_checking_account' => $request->beneficiary_schet,
                'z_inn' => $request->inn_beneficiary,
                'z_mfo' => $request->mfo_beneficiary,
                'bank_id' => $request->bank_beneficiary,
                'z_oked' => $request->oked_beneficiary
            ]
        );

        if (!empty($request->passport_copy)) {
            $passport_copy_file_path = $request->passport_copy->store("documents_potrebkredit");
        } else {
            $passport_copy_file_path = null;
        }
        if (!empty($request->dogovor_copy)) {
            $dogovor_copy_file_path = $request->dogovor_copy->store("documents_potrebkredit");
        } else {
            $dogovor_copy_file_path = null;
        }
        if (!empty($request->spravka_copy)) {
            $sprafka_copy_file_path = $request->spravka_copy->store("documents_potrebkredit");
        } else {
            $sprafka_copy_file_path = null;
        }
        if (!empty($request->spravka_rabota_copy)) {
            $sprafka_rabota_copy_file_path = $request->spravka_rabota_copy->store("documents_potrebkredit");
        } else {
            $sprafka_rabota_copy_file_path = null;
        }
        if (!empty($request->other_copy)) {
            $other_copy_file_path = $request->other_copy->store("documents_potrebkredit");
        } else {
            $other_copy_file_path = null;
        }

        if (!empty($request->application_form_file)) {
            $application_form_file_path = $request->application_form_file->store("documents_credit");
        } else {
            $application_form_file_path = null;
        }
        if (!empty($request->contract_file)) {
            $contract_file_path = $request->contract_file->store("documents_credit");
        } else {
            $contract_file_path = null;
        }
        if (!empty($request->policy_file)) {
            $policy_file_path = $request->policy_file->store("documents_credit");
        } else {
            $policy_file_path = null;
        }

//        if ($request->tariff === 'tariff'){
//            $request->validate([
//                'tariff_other'=> 'required'
//            ]);
//        }
//
//        if ($request->preim === 'preim'){
//            $request->validate([
//                'premiya_other'=> 'required'
//            ]);
//        }

        $all_product = AllProduct::create(
            [
                'policy_holder_id' => $policyHolder->id,
                'zaemshik_id' => $zaemshik->id,
                'dogovor_num' => $request->dogovor_num,
                'date_dogovor_strah' => $request->date_dogovor_strah,
                'credit_dogovor_num' => $request->credit_dogovor_num,
                'date_kredit_dogovor' => $request->date_kredit_dogovor,
                'loan_sum' => $request->loan_sum,
                'term_from' => $request->term_from,
                'term_to' => $request->term_to,
                'object_from_date' => $request->object_from_date,
                'object_to_date' => $request->object_to_date,
                'zalog_vid' => $request->zalog_vid,
                'loan_reason' => $request->loan_reason,
                'tovar_about' => $request->tovar_about,
                'zalog_obesp_summ' => $request->zalog_obesp_summ,
                'insurance_sum' => $request->insurance_sum,
                'insurance_bonus' => $request->insurance_bonus,
                'franchise' => $request->franchise,
                'insurance_premium_currency' => $request->insurance_premium_currency,
                'payment_term' => $request->payment_term,
                'way_of_calculation' => $request->way_of_calculation,
                "payment_sum_main" => $request->payment_sum_main,
                "payment_from_main" => $request->payment_from_main,
                "tariff" => $request->tariff,
                "tariff_other" => $request->tariff_other,
                "preim" => $request->preim,
                "premiya_other" => $request->premiya_other,
                'passport_copy' => $passport_copy_file_path,
                'dogovor_copy' => $dogovor_copy_file_path,
                'spravka_copy' => $sprafka_copy_file_path,
                'spravka_rabota_copy' => $sprafka_rabota_copy_file_path,
                'other_copy' => $other_copy_file_path,
                'application_form_file' => $application_form_file_path,
                'contract_file' => $contract_file_path,
                'policy_file' => $policy_file_path,
            ]
        );

        $all_product_info = AllProductInformation::create(
            [
                'all_products_id' => $all_product->id,
                'policy_series' => $request->policy_series,
                'policy_insurance_from' => $request->policy_insurance_from,
                'otvet_litso' => $request->otvet_litso
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
        return view('credit.potrebkredit_edit', compact('agents', 'all_product'));
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
        $currencyTerms = AllProductsTermsTransh::query()->where('all_products_id', $all_product->id)->first();
        $all_product_info = AllProductInformation::query()->where('all_products_id', $all_product->id)->first();

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
            ]
        );

        $zaemshik->update(
            [
                'z_fio' => $request->fio_insured,
                'z_address' => $request->address_beneficiary,
                'z_phone' => $request->tel_beneficiary,
                'z_checking_account' => $request->beneficiary_schet,
                'z_inn' => $request->inn_beneficiary,
                'z_mfo' => $request->mfo_beneficiary,
                'bank_id' => $request->bank_beneficiary,
                'z_oked' => $request->oked_beneficiary
            ]
        );

        if (!empty($request->passport_copy)) {
            Storage::delete($all_product->passport_copy_file_path);
            $passport_copy_file_path = $request->passport_copy->store("documents_potrebkredit_edit");
        } else {
            $passport_copy_file_path = $all_product->passport_copy;
        }
        if (!empty($request->dogovor_copy)) {
            Storage::delete($all_product->dogovor_copy_file_path);
            $dogovor_copy_file_path = $request->dogovor_copy->store("documents_potrebkredit_edit");
        } else {
            $dogovor_copy_file_path = $all_product->dogovor_copy;
        }
        if (!empty($request->spravka_copy)) {
            Storage::delete($all_product->sprafka_copy_file_path);
            $sprafka_copy_file_path = $request->spravka_copy->store("documents_potrebkredit_edit");
        } else {
            $sprafka_copy_file_path = $all_product->spravka_copy;
        }
        if (!empty($request->spravka_rabota_copy)) {
            Storage::delete($all_product->sprafka_rabota_copy_file_path);
            $sprafka_rabota_copy_file_path = $request->spravka_rabota_copy->store("documents_potrebkredit_edit");
        } else {
            $sprafka_rabota_copy_file_path = $all_product->spravka_rabota_copy;
        }
        if (!empty($request->other_copy)) {
            Storage::delete($all_product->other_copy_file_path);
            $other_copy_file_path = $request->other_copy->store("documents_potrebkredit_edit");
        } else {
            $other_copy_file_path = $all_product->other_copy_file;
        }

        if (!empty($request->application_form_file)) {
            Storage::delete($all_product->application_form_file_path);
            $application_form_file_path = $request->application_form_file->store("documents_potrebkredit_edit");
        } else {
            $application_form_file_path = $all_product->application_form_file;
        }
        if (!empty($request->contract_file)) {
            Storage::delete($all_product->contract_file_path);
            $contract_file_path = $request->contract_file->store("documents_potrebkredit_edit");
        } else {
            $contract_file_path = $all_product->contract_file;
        }
        if (!empty($request->policy_file)) {
            Storage::delete($all_product->policy_file_path);
            $policy_file_path = $request->policy_file->store("documents_potrebkredit_edit");
        } else {
            $policy_file_path = $all_product->policy_file;
        }

        $all_product->update(
            [
                'policy_holder_id' => $policyHolder->id,
                'zaemshik_id' => $zaemshik->id,
                'dogovor_num' => $request->dogovor_num,
                'date_dogovor_strah' => $request->date_dogovor_strah,
                'credit_dogovor_num' => $request->credit_dogovor_num,
                'date_kredit_dogovor' => $request->date_kredit_dogovor,
                'loan_sum' => $request->loan_sum,
                'term_from' => $request->term_from,
                'term_to' => $request->term_to,
                'object_from_date' => $request->object_from_date,
                'object_to_date' => $request->object_to_date,
                'zalog_vid' => $request->zalog_vid,
                'loan_reason' => $request->loan_reason,
                'tovar_about' => $request->tovar_about,
                'zalog_obesp_summ' => $request->zalog_obesp_summ,
                'insurance_sum' => $request->insurance_sum,
                'insurance_bonus' => $request->insurance_bonus,
                'franchise' => $request->franchise,
                'insurance_premium_currency' => $request->insurance_premium_currency,
                'payment_term' => $request->payment_term,
                'way_of_calculation' => $request->way_of_calculation,
                "payment_sum_main" => $request->payment_sum_main,
                "payment_from_main" => $request->payment_from_main,
                "tariff" => $request->tariff,
                "tariff_other" => $request->tariff_other,
                "preim" => $request->preim,
                "premiya_other" => $request->premiya_other,
                'passport_copy' => $passport_copy_file_path,
                'dogovor_copy' => $dogovor_copy_file_path,
                'spravka_copy' => $sprafka_copy_file_path,
                'spravka_rabota_copy' => $sprafka_rabota_copy_file_path,
                'other_copy' => $other_copy_file_path,
                'application_form_file' => $application_form_file_path,
                'contract_file' => $contract_file_path,
                'policy_file' => $policy_file_path,
            ]
        );

        if ($currencyTerms->payment_sum !== null) {
            $currencyTerms->update(
                [
                    'all_products_id' => $all_product->id,
                    'payment_sum' => $request->get('payment_sum'),
                    'payment_from' => $request->get('payment_from')
                ]
            );
        }

        $all_product_info->update(
            [
                'all_products_id' => $all_product->id,
                'policy_series' => $request->policy_series,
                'policy_insurance_from' => $request->policy_insurance_from,
                'otvet_litso' => $request->otvet_litso
            ]
        );
        return "success";
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
