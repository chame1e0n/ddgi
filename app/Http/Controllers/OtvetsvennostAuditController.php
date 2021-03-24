<?php

namespace App\Http\Controllers;

use App\AuditInfo;
use App\AuditTurnover;
use App\CurrencyTerm;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Bank;
use App\OtvetsvennostAudit;
use App\Product3777;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OtvetsvennostAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $banks = Bank::query()->get();
        return view('audit.audit', compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
//        $request->validate([
//            //Policy holder
//            'fio_insurer' => 'required',
//            'address_insurer' => 'required',
//            'tel_insurer' => 'required',
//            'address_schet' => 'required',
//            'inn_insurer' => 'required',
//            'mfo_insurer' => 'required',
//            'oked_insurer' => 'required',
//            'bank_insurer' => 'required',
//            'active_type' => 'required',
//            'okonh_insurer' => 'required',
//            'personal_info' => 'required',
//
//            //Audit
//            'insurance_from' => 'required',
//            'insurance_to' => 'required',
//            'geo_zone' => 'required',
//            'active_period_from' => 'required',
//            'active_period_to' => 'required',
//            'questionnaire' => 'required',
//            'contract' => 'required',
//            'policy_file' => 'required',
//
//            //Audit Info
//            'number_polis' => 'required',
//            'series_polis' => 'required',
//            'validity_period_from' => 'required',
//            'validity_period_to' => 'required',
//            'polis_agent' => 'required',
//            'polis_mark' => 'required',
//            'specialty' => 'required',
//            'workExp' => 'required',
//            'polis_model' => 'required',
//            'arriving_time' => 'required',
//            'cost_of_insurance' => 'required',
//            'sum_of_insurance' => 'required',
//            'bonus_of_insurance' => 'required',
//
//
//            //Audit Turnover
//            'polis_premium' => 'required',
//            'turnover' => 'required',
//            'net_profit' => 'required',
//            'second_polis_premium' => 'required',
//            'second_turnover' => 'required',
//            'second_net_profit' => 'required',
//
//            ///Audit
//            'insurance_premium_currency' => 'required',
//            'payment_term' => 'required',
//            'all_sum' => 'required',
//            'franchise' => 'required',
//            'insurance_bonus' => 'required',
//            'polis_series' => 'required',
//            'polis_from' => 'required',
//            'litso' => 'required',
//            'acted' => 'required',
//            'risk' => 'required',
//            'cases' => 'required',
//            'administrative_case' => 'required',
//            'sphere_of_activity' => 'required',
//            'prof_insurance_services' => 'required',
//            'liability_limit' => 'required',
//            'retransfer_akt_file' => 'required',
//
//            'payment_sum' => 'required',
//            'payment_from' => 'required',
//
//        ]);
        if ($request->get('insurance_premium_currency') === "other") {
            $request->validate([
                "payment_sum" => "required",
                "payment_from" => "required"
            ]);
        }

        if ($request->acted == "true") {
            $request->validate([
                'public_sector_comment' => 'required',
                'private_sector_comment' => 'required',
            ]);
            $public_sector_comment = $request->public_sector_comment;
            $private_sector_comment = $request->private_sector_comment;
        } else {
            $public_sector_comment = null;
            $private_sector_comment = null;
        }
        if ($request->cases == "true") {
            $request->validate([
                'reason_case' => 'required',
            ]);
            $reason_case = $request->reason_case;
        } else {
            $reason_case = null;
        }
        if ($request->administrative_case == "true") {
            $request->validate([
                'reason_administrative_case' => 'required',
            ]);
            $reason_administrative_case = $request->administrative_case;
        } else {
            $reason_administrative_case = null;
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
            'activity_type' => $request->active_type,
            'personal_info' => $request->personal_info,
        ]);

        $auditTurnover = AuditTurnover::create([
            'polis_premium' => $request->polis_premium,
            'turnover' => $request->turnover,
            'net_profit' => $request->net_profit,
            'second_polis_premium' => $request->second_polis_premium,
            'second_turnover' => $request->second_turnover,
            'second_net_profit' => $request->second_net_profit,

        ]);
        $questionnaire_path = $request->questionnaire->store("documents");
        $contract_path = $request->contract->store("documents");
        $policy_file_path = $request->policy_file->store("documents");
        $retransfer_akt_file_path = $request->retransfer_akt_file->store("documents");
        $audit = OtvetsvennostAudit::create([
            'policy_holder_id' => $policyHolder->id,
            'audit_turnover_id' => $auditTurnover->id,
            'insurance_from' => $request->insurance_from,
            'insurance_to' => $request->insurance_to,
            'geo_zone' => $request->geo_zone,
            'active_period_from' => $request->active_period_from,
            'active_period_to' => $request->active_period_to,

            'questionnaire' => $questionnaire_path,
            'contract' => $contract_path,
            'policy_file' => $policy_file_path,

            'polis_series' => $request->polis_series,
            'polis_from' => $request->polis_from,
            'litso' => $request->litso,

            'insurance_premium_currency' => $request->insurance_premium_currency,
            'payment_term' => $request->payment_term,
            'all_sum' => $request->all_sum,
            'franchise' => $request->franchise,
            'insurance_bonus' => $request->insurance_bonus,
            'payment_sum_main' => $request->payment_sum_main,
            'payment_from_main' => $request->payment_from_main,

            'acted' => $request->acted,
            'public_sector_comment' => $public_sector_comment,
            'private_sector_comment' => $private_sector_comment,
            'risk' => $request->risk,
            'cases' => $request->cases,
            'reason_case' => $reason_case,
            'administrative_case' => $request->administrative_case,
            'reason_administrative_case' => $reason_administrative_case,
            'sphere_of_activity' => $request->sphere_of_activity,
            'prof_insurance_services' => $request->prof_insurance_services,
            'liability_limit' => $request->liability_limit,
            'retransfer_akt_file' => $retransfer_akt_file_path,

            'number_polis_main' => $request->number_polis_main,
            'series_polis_main' => $request->series_polis_main,
            'validity_period_from_main' => $request->validity_period_from_main,
            'validity_period_to_main' => $request->validity_period_to_main,
            'polis_agent_main' => $request->polis_agent_main,
            'polis_mark_main' => $request->polis_mark_main,
            'specialty_main' => $request->specialty_main,
            'workExp_main' => $request->workExp_main,
            'polis_model_main' => $request->polis_model_main,
            'arriving_time_main' => $request->arriving_time_main,
            'cost_of_insurance_main' => $request->cost_of_insurance_main,
            'sum_of_insurance_main' => $request->sum_of_insurance_main,
            'bonus_of_insurance_main' => $request->bonus_of_insurance_main,

        ]);
        $quantuty = count($request->get("payment_sum"));
        for ($i = 0; $i < $quantuty; $i++) {
            $currency_terms = CurrencyTerm::create([
                'otvetsvennost_audit_id' => $audit->id,
                'payment_sum' => $request->get('payment_sum')[$i],
                'payment_from' => $request->get('payment_from')[$i]
            ]);
        }

        $count = count($request->get("number_polis"));
        for ($i = 0; $i < $count; $i++) {
            $auditInfo = AuditInfo::create([
                'otvetsvennost_audit_id' => $audit->id,
                'number_polis' => $request->get('number_polis')[$i],
                'series_polis' => $request->get('series_polis')[$i],
                'validity_period_from' => $request->get('validity_period_from')[$i],
                'validity_period_to' => $request->get('validity_period_to')[$i],
                'polis_agent' => $request->get('polis_agent')[$i],
                'polis_mark' => $request->get('polis_mark')[$i],
                'specialty' => $request->get('specialty')[$i],
                'workExp' => $request->get('workExp')[$i],
                'polis_model' => $request->get('polis_model')[$i],
                'arriving_time' => $request->get('arriving_time')[$i],
                'cost_of_insurance' => $request->get('cost_of_insurance')[$i],
                'sum_of_insurance' => $request->get('sum_of_insurance')[$i],
                'bonus_of_insurance' => $request->get('bonus_of_insurance')[$i],
            ]);
        }

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
     */
    public function edit($id)
    {
        $product = OtvetsvennostAudit::query()->with('policyHolder', 'auditTurnover', 'auditInfos', 'currencyTerms')->findOrFail($id);

        $banks = Bank::query()->get();
        return view('audit.edit', compact('product', 'banks'));
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
        $product = OtvetsvennostAudit::query()->findOrFail($id);
        $policyHolder = PolicyHolder::query()->findOrFail($product->policy_holder_id);
        $auditTurnover = AuditTurnover::query()->findOrFail($product->audit_turnover_id);

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
            'activity_type' => $request->active_type,
            'personal_info' => $request->personal_info,
        ]);

        $auditTurnover->update([
            'polis_premium' => $request->polis_premium,
            'turnover' => $request->turnover,
            'net_profit' => $request->net_profit,
            'second_polis_premium' => $request->second_polis_premium,
            'second_turnover' => $request->second_turnover,
            'second_net_profit' => $request->second_net_profit,

        ]);
        if(!empty($request->questionnaire)) {
            $questionnaire_path = $request->questionnaire->store("pictures");
            Storage::delete($product->questionnaire_path);
        } else {
            $questionnaire_path = $product->questionnaire_path;
        }
        if(!empty($request->contract)) {
            $contract_path = $request->contract->store("pictures");
            Storage::delete($product->contract_path);
        } else {
            $contract_path = $product->contract_path;
        }
        if(!empty($request->policy_file)) {
            $policy_file_path = $request->policy_file->store("pictures");
            Storage::delete($product->policy_file_path);
        } else {
            $policy_file_path = $product->policy_file_path;
        }
        if(!empty($request->retransfer_akt_file)) {
            $retransfer_akt_file_path = $request->retransfer_akt_file->store("pictures");
            Storage::delete($product->policy_file_path);
        } else {
            $retransfer_akt_file_path = $product->retransfer_akt_file;
        }
        $product->update([
            'policy_holder_id' => $policyHolder->id,
            'audit_turnover_id' => $auditTurnover->id,
            'insurance_from' => $request->insurance_from,
            'insurance_to' => $request->insurance_to,
            'geo_zone' => $request->geo_zone,
            'active_period_from' => $request->active_period_from,
            'active_period_to' => $request->active_period_to,

            'questionnaire' => $questionnaire_path,
            'contract' => $contract_path,
            'policy_file' => $policy_file_path,

            'polis_series' => $request->polis_series,
            'polis_from' => $request->polis_from,
            'litso' => $request->litso,

            'insurance_premium_currency' => $request->insurance_premium_currency,
            'payment_term' => $request->payment_term,
            'all_sum' => $request->all_sum,
            'franchise' => $request->franchise,
            'insurance_bonus' => $request->insurance_bonus,
            'payment_sum_main' => $request->payment_sum_main,
            'payment_from_main' => $request->payment_from_main,

            'acted' => $request->acted,
            'public_sector_comment' => $request->public_sector_comment,
            'private_sector_comment' => $request->private_sector_comment,
            'risk' => $request->risk,
            'cases' => $request->cases,
            'reason_case' => $request->reason_case,
            'administrative_case' => $request->administrative_case,
            'reason_administrative_case' => $request->reason_administrative_case,
            'sphere_of_activity' => $request->sphere_of_activity,
            'prof_insurance_services' => $request->prof_insurance_services,
            'liability_limit' => $request->liability_limit,
            'retransfer_akt_file' => $retransfer_akt_file_path,

            'number_polis_main' => $request->number_polis_main,
            'series_polis_main' => $request->series_polis_main,
            'validity_period_from_main' => $request->validity_period_from_main,
            'validity_period_to_main' => $request->validity_period_to_main,
            'polis_agent_main' => $request->polis_agent_main,
            'polis_mark_main' => $request->polis_mark_main,
            'specialty_main' => $request->specialty_main,
            'workExp_main' => $request->workExp_main,
            'polis_model_main' => $request->polis_model_main,
            'arriving_time_main' => $request->arriving_time_main,
            'cost_of_insurance_main' => $request->cost_of_insurance_main,
            'sum_of_insurance_main' => $request->sum_of_insurance_main,
            'bonus_of_insurance_main' => $request->bonus_of_insurance_main,

        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        $product = OtvetsvennostAudit::query()->findOrFail($id);
        $auditInfos = AuditInfo::query()->where('otvetsvennost_audit_id', $product->id)->get();
        $polocyHolder = PolicyHolder::query()->findOrFail($product->policy_holder_id);
        $audutTurnOver = AuditTurnover::query()->findOrFail($product->audit_turnover_id);
        $polocyHolder->delete();
        $audutTurnOver->delete();
        foreach ($auditInfos as $item) {
            $item->delete();
        }
        $product->delete();
        return "success";
    }
}
