<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\PolicyInformation;
use App\Models\Product\Kasko;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;

class KaskoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kaskos = PolicyInformation::latest()->paginate(10);

        return view('kasko.index',compact('kaskos'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
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

        return view('kasko.create', compact('policySeries', 'agents', 'banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $policyHolderIds = [];
        $policyBeneficiaryIds = [];
        $policyInformationIds = [];
        $policyIds = [];
//        dd($request);

        foreach ($request->polis_series as $key => $value) {
            $policyId = Policy::select('id')
                ->where('status', 'new')
                ->where('policy_series_id', $request->polis_series)
                ->whereNotIn('id', $policyIds)
                ->first();

            if (!empty($policyId)) {
                $policyIds[] = $policyId->id;
            } else {
                return back()->withErrors([
                    'В базе отсутсвуют необходимое количество полюсов'
                ]);
            }
        }
        dd($policyIds);

        $kasko = new Kasko;
        $kasko->type = $request->client_type_radio; //Todo::Change it later
        $kasko->product_id = 1;
        $kasko->from_date = $request->insurance_from;
        $kasko->to_date = $request->insurance_to;
        $kasko->reason = $request->reason;
        $kasko->geo_zone = $request->geo_zone;
        $kasko->defect_img = $request->defects_images;
        $kasko->purpose = $request->purpose;
        $kasko->save();

//        dd($request);

        foreach ($request->fio_insurer as $key => $value) {
            $policyHolder = new PolicyHolder;
            $policyHolder->FIO = $request->fio_insurer[$key];
            $policyHolder->address = $request->address_insurer[$key];
            $policyHolder->phone_number = $request->tel_insurer[$key];
            $policyHolder->checking_account = $request->address_schet[$key];
            $policyHolder->inn = $request->inn_insurer[$key];
            $policyHolder->mfo = $request->mfo_insurer[$key];
            $policyHolder->okonx = $request->okonh_insurer[$key];
            $policyHolder->bank_id = 1;//$request->bank_insurer; //Todo::Change it later
            $policyHolder->save();

            $policyHolderIds[] = $policyHolder->id;
        }

        foreach ($request->fio_beneficiary as $key => $value) {
            $policyBeneficiary = new PolicyBeneficiaries;
            $policyBeneficiary->FIO = $request->fio_beneficiary[$key];
            $policyBeneficiary->address = $request->address_beneficiary[$key];
            $policyBeneficiary->phone_number = $request->tel_beneficiary[$key];
            $policyBeneficiary->checking_account = $request->beneficiary_schet[$key];
            $policyBeneficiary->inn = $request->inn_beneficiary[$key];
            $policyBeneficiary->mfo = $request->mfo_beneficiary[$key];
            $policyBeneficiary->okonx = $request->okonh_beneficiary[$key];
            $policyBeneficiary->bank_id = 1;//$request->bank_beneficiary;
            $policyBeneficiary->save();

            $policyBeneficiaryIds[] = $policyBeneficiary->id;
        }

        foreach ($request->polis_series as $key => $value) {
            $policyInformation = new PolicyInformation;
            $policyInformation->policy_id = $policyIds[$key];
            $policyInformation->policy_series_id = $request->polis_series[$key];
            $policyInformation->period = $request->period_polis[$key];
            $policyInformation->user_id = $request->polis_agent[$key];
            $policyInformation->line_id = $request->polis_id[$key];
            $policyInformation->brand = $request->polis_mark[$key];
            $policyInformation->model = $request->polis_model[$key];
            $policyInformation->modification = $request->polis_modification[$key];
            $policyInformation->gov_number = $request->polis_gos_num[$key];
            $policyInformation->tech_passport = $request->polis_teh_passport[$key];
            $policyInformation->engine_number = $request->polis_num_engine[$key];
            $policyInformation->carcase_number = $request->polis_num_body[$key];
            $policyInformation->payload = $request->polis_payload[$key];
            $policyInformation->seats_number = $request->polis_places[$key];
            $policyInformation->polnaya_strahovaya_stoimost = $request->polis_sum[$key];
            $policyInformation->polnaya_strahovaya_summa = $request->overall_polis_sum[$key];
            $policyInformation->polnaya_strahovaya_premiya = $request->polis_premium[$key];
            $policyInformation->additional_brand = $request->add_mark_model[$key];
            $policyInformation->additional_equipment = $request->add_name[$key];
            $policyInformation->additional_serial_number = $request->add_series_number[$key];
            $policyInformation->additional_strahovaya_summa = $request->add_insurance_sum[$key];
            $policyInformation->additional_terr_vehical = $request->add_cover_terror_attacks_sum[$key];
            $policyInformation->additional_terr_insured = $request->add_cover_terror_attacks_insured_sum[$key];
            $policyInformation->additional_terr_evacuation = $request->add_coverage_evacuation_cost[$key];
            $policyInformation->additional_is_vihecal_insured = $request->add_strtahovka[$key];
            $policyInformation->additional_other_insurence_info = $request->add_other_insurance_info[$key];
            $policyInformation->additional_is_death = $request->add_vehicle_damage[$key];
            $policyInformation->additional_death_strahovaya_summa = $request->add_vehicle_damage_sum[$key];
            $policyInformation->additiona_death_strahovaya_premiya = $request->add_vehicle_damage_premia[$key];
            $policyInformation->additional_death_franchise = $request->add_vehicle_damage_franshiza[$key];
            $policyInformation->additional_is_civil = $request->add_civil_liability[$key];
            $policyInformation->additional_civil_strahovaya_summa = $request->add_tho_sum[$key];
            $policyInformation->additional_civil_strahovaya_premiya = $request->add_tho_preim[$key];
            $policyInformation->additional_is_accident = $request->add_accidents[$key];
            $policyInformation->additional_accident_driver_strahovaya_summa = $request->add_driver_one_sum[$key];
            $policyInformation->additional_accident_driver_strahovaya_premiya = $request->add_driver_preim_sum[$key];
            $policyInformation->additional_accident_pessanger_number = $request->add_passenger_quantity[$key];
            $policyInformation->additional_accident_pessanger_strahovaya_summa_per = $request->add_passenger_one_sum[$key];
            $policyInformation->additional_accident_pessanger_strahovaya_summa = $request->add_passenger_total_sum[$key];
            $policyInformation->additional_accident_pessanger_strahovaya_premiya = $request->add_passenger_preim_sum[$key];
            $policyInformation->additional_accident_limit_number = $request->add_limit_quantity[$key];
            $policyInformation->additional_accident_limit_strahovaya_summa_per = $request->add_limit_one_sum[$key];
            $policyInformation->additional_accident_limit_strahovaya_summa = $request->add_limit_total_sum[$key];
            $policyInformation->additional_accident_limit_strahovaya_premiya = $request->add_limit_preim_sum[$key];
            $policyInformation->additional_limit = $request->add_total_liability_limit[$key];
            $policyInformation->additional_policy_from_date = $request->add_from_date[$key];
            $policyInformation->additional_strahovaya_premiya_currency = $request->add_payment[$key];
            $policyInformation->additional_poryadok_oplati_currency = $request->add_payment_order[$key];
            $policyInformation->save();

            $policyInformationIds[] = $policyInformation->id;
        }

        $kasko->policyHolders()->attach($policyHolderIds);
        $kasko->policyBeneficiaries()->attach($policyBeneficiaryIds);
        $kasko->policyInformations()->attach($policyInformationIds);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product\Kasko $kasko
     * @return \Illuminate\Http\Response
     */
    public function show(Kasko $kasko)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product\Kasko $kasko
     * @return \Illuminate\Http\Response
     */
    public function edit(Kasko $kasko)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Product\Kasko $kasko
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kasko $kasko)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product\Kasko $kasko
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kasko $kasko)
    {
        $kasko->delete();

        return redirect()->route('kasko.index')
            ->with('success', sprintf('Дынные об каско \'%s\' были успешно удалены', $kasko->id));
    }
}
