<?php

namespace App\Http\Controllers;

use App\BorrowerSportsman;
use App\BorrowerSportsmanInfo;
use App\BorrowerSportsmanOther;
use App\Model\Beneficiary;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractSportsman;
use App\Model\Employee;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use App\Product3777;
use App\Zaemshik;
use Illuminate\Http\Request;

class BorrowerSportsmanController extends Controller
{
    /**
     * Display a list of all contracts.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return redirect()->route('contracts.index');
    }

    /**
     * Show a form to create a new contract.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.borrower_sportsman.form', [
            'beneficiary' => new Beneficiary(),
            'client' => new Client(),
            'contract' => new Contract(),
            'contract_sportsman' => new ContractSportsman(),
            'block' => false,
        ]);
    }

    /**
     * Store a new contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            // policy_holders
            'fio_insurer' => 'required',
            'address_insurer' => 'required',
            'tel_insurer' => 'required',
            'address_schet' => 'required',
            'inn_insurer' => 'required',
            'mfo_insurer' => 'required',
            'oked_insurer' => 'required',
            'okonh_insurer' => 'required',
            'bank_insurer' => 'required',
            'activity_type' => 'required',

            // policy_beneficiaries
            'fio_beneficiary' => 'required',
            'address_beneficiary' => 'required',
            'tel_beneficiary' => 'required',
            'beneficiary_schet' => 'required',
            'inn_beneficiary' => 'required',
            'mfo_beneficiary' => 'required',
            'bank_beneficiary' => 'required',
            'okonh_beneficiary' => 'required',

            // borrower_sportsman
            'insurance_from' => 'required',
            'insurance_to' => 'required',
            'polis_series' => 'required',
            'polis_giving_date' => 'required',
            'litso' => 'required',
            'insurance_premium_currency' => 'required',
            'payment_term' => 'required',

            'all_sum' => 'required',
            'insurance_bonus' => 'required',

            // borrower_sportsman_info
            'policy_num' => 'required',
            'policy_series' => 'required',
            'policy_chronic' => 'required',
            'policy_agent' => 'required',
            'polis_fio' => 'required',
            'polis_date_birth' => 'required',
            'polis_passport_series' => 'required',
            'polis_usable_period' => 'required',
            'polis_benefit' => 'required',
            'polis_overall_sum' => 'required',
            'polis_bonus' => 'required',

        ]);

        if ($request->get('insurance_premium_currency') === "other") {
            $request->validate([
                "payment_bonus_sum" => "required",
                "payment_bonus_from" => "required"
            ]);
        }

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
            'activity_type' => $request->activity_type,
        ]);

        $policyBeneficiary = PolicyBeneficiaries::create([
            'FIO' => $request->fio_beneficiary,
            'address' => $request->address_beneficiary,
            'phone_number' => $request->tel_beneficiary,
            'checking_account' => $request->beneficiary_schet,
            'inn' => $request->inn_beneficiary,
            'mfo' => $request->mfo_beneficiary,
            'okonx' => $request->okonh_beneficiary,
            'bank_id' => $request->bank_beneficiary,
        ]);
        $borrowerSportsman = BorrowerSportsman::create([
            'policy_holder_id' => $policyHolder->id,
            'insurance_from' => $request->insurance_from,
            'insurance_to' => $request->insurance_to,
            'polis_series' => $request->polis_series,
            'polis_giving_date' => $request->polis_giving_date,
            'litso' => $request->litso,
            'insurance_premium_currency' => $request->insurance_premium_currency,
            'payment_term' => $request->payment_term,
            'all_sum' => $request->all_sum,
            'insurance_bonus' => $request->insurance_bonus,
        ]);
        $count = count($request->get("policy_num"));
        for ($i = 0; $i < $count; $i++) {
            $borrowerSportsmanInfos = BorrowerSportsmanInfo::create([
                'borrower_sportsman_id' => $borrowerSportsman->id,
                'policy_num' => $request->get("policy_num")[$i],
                'policy_series' => $request->get("policy_series")[$i],
                'policy_chronic' => $request->get("policy_chronic")[$i],
                'policy_agent' => $request->get("policy_agent")[$i],
                'polis_fio' => $request->get("polis_fio")[$i],
                'polis_date_birth' => $request->get("polis_date_birth")[$i],
                'polis_passport_series' => $request->get("polis_passport_series")[$i],
                'polis_usable_period' => $request->get("polis_usable_period")[$i],
                'polis_benefit' => $request->get("polis_benefit")[$i],
                'polis_overall_sum' => $request->get("polis_overall_sum")[$i],
            ]);
        }
        if (!empty($request->get("other_mark_model"))) {
            $count = count($request->get("other_mark_model"));
            for ($i = 0; $i < $count; $i++) {
                $value = [
                    'borrower_sportsman_id' => $borrowerSportsman->id,
                    'other_mark_model' => (!empty($request->get("other_mark_model")[$i])) ? $request->get("other_mark_model")[$i] : null,
                    'other_name_tools' => (!empty($request->get("other_name_tools")[$i])) ? $request->get("other_name_tools")[$i] : null,
                    'other_series_number' => (!empty($request->get("other_series_number")[$i])) ? $request->get("other_series_number")[$i] : null,
                    'other_insurance_sum' => (!empty($request->get("other_insurance_sum")[$i])) ? $request->get("other_insurance_sum")[$i] : null,
                    'other_total' => (!empty($request->get("other_total")[$i])) ? $request->get("other_total")[$i] : null,
                    'other_cover_terror_attacks_sum' => (!empty($request->get("other_cover_terror_attacks_sum")[$i])) ? $request->get("other_cover_terror_attacks_sum")[$i] : null,
                    'other_cover_terror_attacks_currency' => (!empty($request->get("other_cover_terror_attacks_currency")[$i])) ? $request->get("other_cover_terror_attacks_currency")[$i] : null,
                    'cover_terror_attacks_insured_sum' => (!empty($request->get("cover_terror_attacks_insured_sum")[$i])) ? $request->get("cover_terror_attacks_insured_sum")[$i] : null,
                    'other_cover_terror_attacks_insured_currency' => (!empty($request->get("other_cover_terror_attacks_insured_currency")[$i])) ? $request->get("other_cover_terror_attacks_insured_currency")[$i] : null,
                    'other_coverage_evacuation_cost' => (!empty($request->get("other_coverage_evacuation_cost")[$i])) ? $request->get("other_coverage_evacuation_cost")[$i] : null,
                    'other_coverage_evacuation_currency' => (!empty($request->get("other_coverage_evacuation_currency")[$i])) ? $request->get("other_coverage_evacuation_currency")[$i] : null,
                    'other_insurance_info' => (!empty($request->get("other_insurance_info")[$i])) ? $request->get("other_insurance_info")[$i] : null,
                    'one_sum' => (!empty($request->get("one_sum")[$i])) ? $request->get("one_sum")[$i] : null,
                    'one_premia' => (!empty($request->get("one_premia")[$i])) ? $request->get("one_premia")[$i] : null,
                    'one_franshiza' => (!empty($request->get("one_franshiza")[$i])) ? $request->get("one_franshiza")[$i] : null,
                    'tho_sum' => (!empty($request->get("tho_sum")[$i])) ? $request->get("tho_sum")[$i] : null,
                    'two_preim' => (!empty($request->get("two_preim")[$i])) ? $request->get("two_preim")[$i] : null,
                    'driver_quantity' => (!empty($request->get("driver_quantity")[$i])) ? $request->get("driver_quantity")[$i] : null,
                    'driver_one_sum' => (!empty($request->get("driver_one_sum")[$i])) ? $request->get("driver_one_sum")[$i] : null,
                    'driver_currency' => (!empty($request->get("driver_currency")[$i])) ? $request->get("driver_currency")[$i] : null,
                    'driver_total_sum' => (!empty($request->get("driver_total_sum")[$i])) ? $request->get("driver_total_sum")[$i] : null,
                    'driver_preim_sum' => (!empty($request->get("driver_preim_sum")[$i])) ? $request->get("driver_preim_sum")[$i] : null,
                    'passenger_quantity' => (!empty($request->get("passenger_quantity")[$i])) ? $request->get("passenger_quantity")[$i] : null,
                    'passenger_one_sum' => (!empty($request->get("passenger_one_sum")[$i])) ? $request->get("passenger_one_sum")[$i] : null,
                    'passenger_currency' => (!empty($request->get("passenger_currency")[$i])) ? $request->get("passenger_currency")[$i] : null,
                    'passenger_total_sum' => (!empty($request->get("passenger_total_sum")[$i])) ? $request->get("passenger_total_sum")[$i] : null,
                    'passenger_preim_sum' => (!empty($request->get("passenger_preim_sum")[$i])) ? $request->get("passenger_preim_sum")[$i] : null,
                    'limit_quantity' => (!empty($request->get("limit_quantity")[$i])) ? $request->get("limit_quantity")[$i] : null,
                    'limit_one_sum' => (!empty($request->get("limit_one_sum")[$i])) ? $request->get("limit_one_sum")[$i] : null,
                    'limit_currency' => (!empty($request->get("limit_currency")[$i])) ? $request->get("limit_currency")[$i] : null,
                    'limit_total_sum' => (!empty($request->get("limit_total_sum")[$i])) ? $request->get("limit_total_sum")[$i] : null,
                    'limit_preim_sum' => (!empty($request->get("limit_preim_sum")[$i])) ? $request->get("limit_preim_sum")[$i] : null,
                    'total_liability_limit' => (!empty($request->get("total_liability_limit")[$i])) ? $request->get("total_liability_limit")[$i] : null,
                    'total_liability_limit_currency' => (!empty($request->get("total_liability_limit_currency")[$i])) ? $request->get("total_liability_limit_currency")[$i] : null,
                    'other_form_policy' => (!empty($request->get("other_form_policy")[$i])) ? $request->get("other_form_policy")[$i] : null,
                    'other_from_date' => (!empty($request->get("other_from_date")[$i])) ? $request->get("other_from_date")[$i] : null,
                    'other_agent' => (!empty($request->get("other_agent")[$i])) ? $request->get("other_agent")[$i] : null,
                    'other_payment' => (!empty($request->get("other_payment")[$i])) ? $request->get("other_payment")[$i] : null,
                    'payment_order' => (!empty($request->get("payment_order")[$i])) ? $request->get("payment_order")[$i] : null,
                    'other_totally_sum' => (!empty($request->get("other_totally_sum")[$i])) ? $request->get("other_totally_sum")[$i] : null
                ];
                BorrowerSportsmanOther::create($value);
            }
        }

        return "success";

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        //
    }
}
