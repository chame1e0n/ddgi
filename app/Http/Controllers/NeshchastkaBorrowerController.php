<?php

namespace App\Http\Controllers;

use App\CurrencyTermsTransh;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Bank;
use App\NeshchastkaBorrower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NeshchastkaBorrowerController extends Controller
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
        return view('neshchastka_borrower.borrower_create');
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

//        $request->validate([
//            // policy_holders
//            'fio_insurer' => 'required',
//            'address_insurer' => 'required',
//            'tel_insurer' => 'required',
//            'address_schet' => 'required',
//            'inn_insurer' => 'required',
//            'mfo_insurer' => 'required',
//            'oked_insurer' => 'required',
//            'okonh_insurer' => 'required',
//            'bank_insurer' => 'required',
//
//            ////
//            'fio_insured'=> 'required',
//            'address_insured'=> 'required',
//            'tel_insured'=> 'required',
//            'passport_series_insured'=> 'required',
//            'passport_num_insured'=> 'required',
//
//            'credit_contract'=> 'required',
//            'credit_contract_to'=> 'required',
//            'insurance_from'=> 'required',
//            'insurance_to'=> 'required',
//            //'tarif' => 'required',
//
//            'insurance_sum'=> 'required',
//            'insurance_bonus'=> 'required',
//            'franchise'=> 'required',
//            'insurance_premium_currency'=> 'required',
//            'payment_term'=> 'required',
//            'way_of_calculation'=> 'required',

//            'payment_sum_main'=>'required',
//            'payment_from_main'=>'required',

//            'policy_series'=> 'required',
//            'policy_insurance_from'=> 'required',
//            'person'=> 'required',

//            'application_form_file'=> 'required',
//            'contract_file'=> 'required',
//            'policy_file'=> 'required',
//
//
//            //////////////////
//
//            // policy_beneficiaries
//            'fio_beneficiary' => 'required',
//            'address_beneficiary' => 'required',
//            'tel_beneficiary' => 'required',
//            'beneficiary_schet' => 'required',
//            'inn_beneficiary' => 'required',
//            'mfo_beneficiary' => 'required',
//            'oked_beneficiary' => 'required',
//            'bank_beneficiary' => 'required',
//            'okonh_beneficiary' => 'required',
//
//        ]);
//
//        if (!$request->tarif === "null"){
//            $request->validate([
//                'percent_of_tariff'=>'required',
//            ]);
//        }
//
//        if ($request->get('payment_term') === "transh"){
//            $request->validate([
//                "payment_bonus_sum" => "required",
//                "payment_bonus_from" => "required"
//            ]);
//        }


        $policyHolder = PolicyHolder::create([
            'FIO' => $request->fio_insurer,
            'address' => $request->address_insurer,
            'phone_number' => $request->tel_insurer,
            'checking_account' => $request->address_schet,
            'inn' => $request->inn_insurer,
            'mfo' => $request->mfo_insurer,
            'oked' => $request->oked_insurer,
            'bank_id' => $request->bank_insurer,
            'okonx' => $request->okonh_insurer,
        ]);

        $policy_beneficiaries = PolicyBeneficiaries::create([
            'FIO' => $request->fio_beneficiary,
            'address' => $request->address_beneficiary,
            'phone_number' => $request->tel_beneficiary,
            'checking_account' => $request->beneficiary_schet,
            'inn' => $request->inn_beneficiary,
            'mfo' => $request->mfo_beneficiary,
            'okonx' => $request->okonh_beneficiary,
            'oked' => $request->oked_beneficiary,
            'bank_id' => $request->bank_beneficiary,
        ]);

        if (!empty($request->application_form_file)) {
            $application_form_file_path = $request->application_form_file->store("documents_borrower");
        } else {
            $application_form_file_path = null;
        }
        if (!empty($request->contract_file)) {
            $contract_file_path = $request->contract_file->store("documents_borrower");
        } else {
            $contract_file_path = null;
        }
        if (!empty($request->policy_file)) {
            $policy_file_path = $request->policy_file->store("documents_borrower");
        } else {
            $policy_file_path = null;
        }
        $borrower = NeshchastkaBorrower::create([
            'policy_holder_id' => $policyHolder->id,
            'policy_beneficiaries_id' => $policy_beneficiaries->id,
            'fio_insured' => $request->fio_insured,
            'address_insured' => $request->address_insured,
            'tel_insured' => $request->tel_insured,
            'passport_series_insured' => $request->passport_series_insured,
            'passport_num_insured' => $request->passport_num_insured,
            'credit_contract' => $request->credit_contract,
            'credit_contract_to' => $request->credit_contract_to,
            'insurance_from' => $request->insurance_from,
            'insurance_to' => $request->insurance_to,
            'tariff' => $request->tarif,
            'percent_of_tariff' => $request->percent_of_tariff,
            'insurance_sum' => $request->insurance_sum,
            'insurance_bonus' => $request->insurance_bonus,
            'franchise' => $request->franchise,
            'insurance_premium_currency' => $request->insurance_premium_currency,
            'payment_term' => $request->payment_term,
            'way_of_calculation' => $request->way_of_calculation,
            'payment_sum_main' => $request->payment_sum_main,
            'payment_from_main' => $request->payment_from_main,
            'policy_series' => $request->policy_series,
            'policy_insurance_from' => $request->policy_insurance_from,
            'person' => $request->person,
            'application_form_file' => $application_form_file_path,
            'contract_file' => $contract_file_path,
            'policy_file' => $policy_file_path,
        ]);

        $currencyTermsTransh = CurrencyTermsTransh::create([
            'borrower_id' => $borrower->id,
            'payment_sum' => $request->get('payment_sum'),
            'payment_from' => $request->get('payment_from')
        ]);


        return "Saved successfully";

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
        $borrower = NeshchastkaBorrower::query()->with('policyHolder', 'policyBeneficiaries', 'currencyTerms')->findOrFail($id);
        $banks = Bank::query()->get();
        return view('neshchastka_borrower.edit', compact('borrower', 'banks'));
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
        $borrower = NeshchastkaBorrower::query()->find($id);
        $policyHolder = PolicyHolder::query()->find($borrower->policy_holder_id);
        $policyBeneficiaries = PolicyBeneficiaries::query()->find($borrower->policy_beneficiaries_id);
        $currencyTerms = CurrencyTermsTransh::query()->where('borrower_id', $borrower->id)->first();



        $policyHolder->update([
            'FIO' => $request->fio_insurer,
            'address' => $request->address_insurer,
            'phone_number' => $request->tel_insurer,
            'checking_account' => $request->address_schet,
            'inn' => $request->inn_insurer,
            'mfo' => $request->mfo_insurer,
            'oked' => $request->oked_insurer,
            'bank_id' => $request->bank_insurer,
            'okonx' => $request->okonh_insurer,
        ]);

        $policyBeneficiaries->update([
            'FIO' => $request->fio_beneficiary,
            'address' => $request->address_beneficiary,
            'phone_number' => $request->tel_beneficiary,
            'checking_account' => $request->beneficiary_schet,
            'inn' => $request->inn_beneficiary,
            'mfo' => $request->mfo_beneficiary,
            'okonx' => $request->okonh_beneficiary,
            'oked' => $request->oked_beneficiary,
            'bank_id' => $request->bank_beneficiary,
        ]);

        if (!empty($request->application_form_file)) {
            Storage::delete($borrower->application_form_file_path);
            $application_form_file_path = $request->application_form_file->store("documents_borrower_edit");
        } if(empty($request->application_form_file)) {
            $application_form_file_path = $borrower->application_form_file;
        }
        if (!empty($request->contract_file)) {
            Storage::delete($borrower->contract_file_path);
            $contract_file_path = $request->contract_file->store("documents_borrower_edit");
        } else {
            $contract_file_path = $borrower->contract_file;
        }
        if (!empty($request->policy_file)) {
            Storage::delete($borrower->policy_file_path);
            $policy_file_path = $request->policy_file->store("documents_borrower_edit");
        } else {
            $policy_file_path = $borrower->policy_file;
        }

        $borrower ->update([
            'policy_holder_id' => $policyHolder->id,
            'policy_beneficiaries_id' => $policyBeneficiaries->id,
            'fio_insured' => $request->fio_insured,
            'address_insured' => $request->address_insured,
            'tel_insured' => $request->tel_insured,
            'passport_series_insured' => $request->passport_series_insured,
            'passport_num_insured' => $request->passport_num_insured,
            'credit_contract' => $request->credit_contract,
            'credit_contract_to' => $request->credit_contract_to,
            'insurance_from' => $request->insurance_from,
            'insurance_to' => $request->insurance_to,
            'tariff' => $request->tarif,
            'percent_of_tariff' => $request->percent_of_tariff,
            'insurance_sum' => $request->insurance_sum,
            'insurance_bonus' => $request->insurance_bonus,
            'franchise' => $request->franchise,
            'insurance_premium_currency' => $request->insurance_premium_currency,
            'payment_term' => $request->payment_term,
            'way_of_calculation' => $request->way_of_calculation,
            'payment_sum_main' => $request->payment_sum_main,
            'payment_from_main' => $request->payment_from_main,
            'policy_series' => $request->policy_series,
            'policy_insurance_from' => $request->policy_insurance_from,
            'person' => $request->person,
            'application_form_file' => $application_form_file_path,
            'contract_file' => $contract_file_path,
            'policy_file' => $policy_file_path,
        ]);
        $currencyTerms ->update([
            'borrower_id' => $borrower->id,
            'payment_sum' => $request->get('payment_sum'),
            'payment_from' => $request->get('payment_from')
        ]);

        return "Succeed on editing!!!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrower = NeshchastkaBorrower::query()->findOrFail($id);
        $currencyTerms = CurrencyTermsTransh::query()->where('borrower_id', $borrower->id)->get();
        $policyHolder = PolicyHolder::query()->findOrFail($borrower->policy_holder_id);
        $policyBeneficiaries = PolicyBeneficiaries::query()->findOrFail($borrower->policy_beneficiaries_id);
        $policyHolder->delete();
        $policyBeneficiaries->delete();
        foreach ($currencyTerms as $item) {
            $item->delete();
        }
        $borrower->delete();
        return "success";
    }
}
