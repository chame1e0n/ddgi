<?php

namespace App\Http\Controllers;

use App\AccompanyingPerson;
use App\CargoInfos;
use App\CargoPaymentTerms;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CargoController extends Controller
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
        $banks = Bank::query()->get();
        $agents = Agent::query()->get();
        return view('cargo.cargo', compact('banks', 'agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
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
//              //Policy Beneficaries
//            'fio_beneficiary' => 'required',
//            'address_beneficiary' => 'required',
//            'tel_beneficiary' => 'required',
//            'email_beneficiary' => 'required',
//            'checking_account' => 'required',
//            'inn_beneficiary' => 'required',
//            'mfo_beneficiary' => 'required',
//            'bank_beneficiary' => 'required',
//            'okonh_beneficiary' => 'required',
//
//            //Cargo_infos
//            'client_type_radio' => 'required',
//            'product_id' => 'required',
//            'dogovor_lizing_num' => 'required',
//            'insurance_from' => 'required',
//            'steamer_point' => 'required',
//            'appointment_point' => 'required',
//            'geo_zone' => 'required',
//            'overloads_place' => 'required',
//            'country_of_insurance' => 'required',
//            'location_of_cargo' => 'required',
//            'name_of_cargo' => 'required',
//            'type_of_cargo' => 'required',
//            'type_packaging' => 'required',
//            'weight_of_cargo' => 'required',
//            'amount_of_cargo' => 'required',
//            'type_of_transport' => 'required',
//            'qualities_of_cargo' => 'required',
//
//            //Cargo Other
//            'fio_accompanying' => 'required',
//            'position_accompanying' => 'required',
//            'amount_of_cargo_place' => 'required',
//            'transporter' => 'required',
//            'name_of_shipper' => 'required',
//            'address_shipper' => 'required',
//            'name_consignee' => 'required',
//            'address_consignee' => 'required',
//            'insurance_period_from' => 'required',
//            'insurance_to' => 'required',
//            'packaging_period_from' => 'required',
//            'packaging_period_to' => 'required',
//            'condition_insurance' => 'required',
//            'accompanying_file' => 'required',
//            'insurance_sum' => 'required',
//            'insurance_bonus' => 'required',
//            'franchise' => 'required',
//            'insurance_premium_currency' => 'required',
//            'payment_term' => 'required',
//            'polis_series' => 'required',
//            'date_giving_insurance' => 'required',
//            'responsible_person' => 'required',
//            'application_form' => 'required',
//            'contract' => 'required',
//            'policy' => 'required',
//        ]);

        if ($request->get('insurance_premium_currency') === "other") {
            $request->validate([
                "payment_sum_main" => "required",
                "payment_from_main" => "required"
            ]);
        }

        $policyHolder = PolicyHolder::create([
            'FIO' => $request->fio_insurer,
            'address' => $request->address_insurer,
            'phone_number' => $request->tel_insurer,
            'email_address' => $request->email_address,
            'checking_account' => $request->address_schet,
            'inn' => $request->inn_insurer,
            'mfo' => $request->mfo_insurer,
            'bank_id' => $request->bank_insurer,
            'okonx' => $request->okonh_insurer,
        ]);
        $policyBeneficiaries = PolicyBeneficiaries::create([
            'FIO' => $request->fio_beneficiary,
            'address' => $request->address_beneficiary,
            'phone_number' => $request->tel_beneficiary,
            'email_beneficiary' => $request->email_beneficiary,
            'checking_account' => $request->checking_account,
            'inn' => $request->inn_beneficiary,
            'mfo' => $request->mfo_beneficiary,
            'bank_id' => $request->bank_beneficiary,
            'okonx' => $request->okonh_beneficiary,
        ]);

        $accompanying_file_path = (!empty($request->accompanying_file)) ? $request->accompanying_file->store("cargoDocuments") : null;
        $application_form_path = (!empty($request->application_form)) ? $request->application_form->store("cargoDocuments") : null;
        $contract_file_path = (!empty($request->contract)) ? $request->contract->store("cargoDocuments") : null;
        $policy_path = (!empty($request->policy)) ? $request->policy->store("cargoDocuments") : null;

        $cargoInfos = CargoInfos::create([
            'policy_holder_id' => $policyHolder->id,
            'policy_beneficiary_id' => $policyBeneficiaries->id,
            'client_type_radio' => $request->client_type_radio,
            'product_id' => $request->product_id,
            'dogovor_lizing_num' => $request->dogovor_lizing_num,
            'insurance_from' => $request->insurance_from,
            'steamer_point' => $request->steamer_point,
            'appointment_point' => $request->appointment_point,
            'geo_zone' => $request->geo_zone,
            'overloads_place' => $request->overloads_place,
            'country_of_insurance' => $request->country_of_insurance,
            'location_of_cargo' => $request->location_of_cargo,
            'name_of_cargo' => $request->name_of_cargo,
            'type_of_cargo' => $request->type_of_cargo,
            'type_packaging' => $request->type_packaging,
            'weight_of_cargo' => $request->weight_of_cargo,
            'amount_of_cargo' => $request->amount_of_cargo,
            'type_of_transport' => $request->type_of_transport,
            'qualities_of_cargo' => $request->qualities_of_cargo,
            'fio_accompanying' => $request->fio_accompanying_main,
            'position_accompanying' => $request->position_accompanying_main,
            'amount_of_cargo_place' => $request->amount_of_cargo_place,
            'transporter' => $request->transporter,
            'name_of_shipper' => $request->name_of_shipper,
            'address_shipper' => $request->address_shipper,
            'name_consignee' => $request->name_consignee,
            'address_consignee' => $request->address_consignee,
            'insurance_period_from' => $request->insurance_period_from,
            'insurance_to' => $request->insurance_to,
            'packaging_period_from' => $request->packaging_period_from,
            'packaging_period_to' => $request->packaging_period_to,
            'condition_insurance' => $request->condition_insurance,
            'accompanying_file' => $accompanying_file_path,
            'insurance_sum' => $request->insurance_sum,
            'insurance_bonus' => $request->insurance_bonus,
            'franchise' => $request->franchise,
            'insurance_premium_currency' => $request->insurance_premium_currency,
            'payment_term' => $request->payment_term,
            'payment_sum_main' => $request->payment_sum_main,
            'payment_from_main' => $request->payment_from_main,
            'policy_series' => $request->policy_series,
            'date_giving_insurance' => $request->date_giving_insurance,
            'responsible_person' => $request->responsible_person,
            'application_form' => $application_form_path,
            'contract' => $contract_file_path,
            'policy' => $policy_path,
        ]);

        if (!empty($request->get("fio_accompanying"))) {
            $cargoAccompanyingPerson = AccompanyingPerson::create([
                'cargo_infos_id' => $cargoInfos->id,
                'fio_accompanying' => $request->fio_accompanying,
                'position_accompanying' => $request->position_accompanying,
            ]);
        }


        if (!empty($request->get("payment_sum"))) {
            $cargoPaymentTerms = CargoPaymentTerms::create([
                'cargo_infos_id' => $cargoInfos->id,
                'payment_sum' => $request->get('payment_sum'),
                'payment_from' => $request->get('payment_from')
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
        $cargo = CargoInfos::query()->with('policyHolder', 'policyBeneficiaries', 'cargoAccompanyingPerson',
            'cargoPaymentTerms')->findOrFail($id);
        $banks = Bank::query()->get();
        $agents = Agent::query()->get();
        return view('cargo.cargoedit', compact('cargo', 'banks', 'agents'));
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
        $cargo = CargoInfos::query()->find($id);
        $policyHolder = PolicyHolder::query()->find($cargo->policy_holder_id);
        $policyBeneficiaries = PolicyBeneficiaries::query()->find($cargo->policy_beneficiary_id);
        $cargoAccompanyingPerson = AccompanyingPerson::query()->where('cargo_infos_id', $cargo->id)->first();
        $currency_terms = CargoPaymentTerms::query()->where('cargo_infos_id', $cargo->id)->first();

        $policyHolder->update([
            'FIO' => $request->fio_insurer,
            'address' => $request->address_insurer,
            'phone_number' => $request->tel_insurer,
            'email_address' => $request->email_address,
            'checking_account' => $request->address_schet,
            'inn' => $request->inn_insurer,
            'mfo' => $request->mfo_insurer,
            'bank_id' => $request->bank_insurer,
            'okonx' => $request->okonh_insurer,
        ]);

        $policyBeneficiaries->update([
            'FIO' => $request->fio_beneficiary,
            'address' => $request->address_beneficiary,
            'phone_number' => $request->tel_beneficiary,
            'email_beneficiary' => $request->email_beneficiary,
            'checking_account' => $request->checking_account,
            'inn' => $request->inn_beneficiary,
            'mfo' => $request->mfo_beneficiary,
            'bank_id' => $request->bank_beneficiary,
            'okonx' => $request->okonh_beneficiary,
        ]);
        if (!empty($request->accompanying_file)) {
            $accompanying_file_path = $request->accompanying_file->store("pictures");
            Storage::delete($cargo->accompanying_file_path);
        } else {
            $accompanying_file_path = $cargo->accompanying_file_path;
        }
        if (!empty($request->contract)) {
            $contract_file_path = $request->contract->store("pictures");
            Storage::delete($cargo->contract_file_path);
        } else {
            $contract_file_path = $cargo->contract_file_path;
        }
        if (!empty($request->policy)) {
            $policy_path = $request->policy->store("pictures");
            Storage::delete($cargo->policy_path);
        } else {
            $policy_path = $cargo->policy_path;
        }
        if (!empty($request->application_form)) {
            $application_form_path = $request->application_form->store("pictures");
            Storage::delete($cargo->application_form);
        } else {
            $application_form_path = $cargo->application_form;
        }
        $cargo->update([
            'policy_holder_id' => $policyHolder->id,
            'policy_beneficiary_id' => $policyBeneficiaries->id,
            'client_type_radio' => $request->client_type_radio,
            'product_id' => $request->product_id,
            'dogovor_lizing_num' => $request->dogovor_lizing_num,
            'insurance_from' => $request->insurance_from,
            'steamer_point' => $request->steamer_point,
            'appointment_point' => $request->appointment_point,
            'geo_zone' => $request->geo_zone,
            'overloads_place' => $request->overloads_place,
            'country_of_insurance' => $request->country_of_insurance,
            'location_of_cargo' => $request->location_of_cargo,
            'name_of_cargo' => $request->name_of_cargo,
            'type_of_cargo' => $request->type_of_cargo,
            'type_packaging' => $request->type_packaging,
            'weight_of_cargo' => $request->weight_of_cargo,
            'amount_of_cargo' => $request->amount_of_cargo,
            'type_of_transport' => $request->type_of_transport,
            'qualities_of_cargo' => $request->qualities_of_cargo,
            'fio_accompanying' => $request->fio_accompanying_main,
            'position_accompanying' => $request->position_accompanying_main,
            'amount_of_cargo_place' => $request->amount_of_cargo_place,
            'transporter' => $request->transporter,
            'name_of_shipper' => $request->name_of_shipper,
            'address_shipper' => $request->address_shipper,
            'name_consignee' => $request->name_consignee,
            'address_consignee' => $request->address_consignee,
            'insurance_period_from' => $request->insurance_period_from,
            'insurance_to' => $request->insurance_to,
            'packaging_period_from' => $request->packaging_period_from,
            'packaging_period_to' => $request->packaging_period_to,
            'condition_insurance' => $request->condition_insurance,
            'accompanying_file' => $accompanying_file_path,
            'insurance_sum' => $request->insurance_sum,
            'insurance_bonus' => $request->insurance_bonus,
            'franchise' => $request->franchise,
            'insurance_premium_currency' => $request->insurance_premium_currency,
            'payment_term' => $request->payment_term,
            'payment_sum_main' => $request->payment_sum_main,
            'payment_from_main' => $request->payment_from_main,
            'policy_series' => $request->policy_series,
            'date_giving_insurance' => $request->date_giving_insurance,
            'responsible_person' => $request->responsible_person,
            'application_form' => $application_form_path,
            'contract' => $contract_file_path,
            'policy' => $policy_path,
        ]);
        if (!empty($cargoAccompanyingPerson)) {
            $cargoAccompanyingPerson->update([
                'fio_accompanying' => (!empty($request->fio_accompanying)) ? $request->fio_accompanying : null,
                'position_accompanying' => (!empty($request->position_accompanying)) ? $request->position_accompanying : null,
            ]);
        }
        if (!empty($currency_terms)) {
            $currency_terms->update([
                'payment_sum' => (!empty($request->payment_sum)) ? $request->payment_sum : null,
                'payment_from' => (!empty($request->payment_from)) ? $request->payment_from : null,
            ]);
        }
        return 'Successfully updated!';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cargo = CargoInfos::query()->findOrFail($id);
        $policyHolder = PolicyHolder::query()->findOrFail($cargo->policy_holder_id);
        $cargoPayments = CargoPaymentTerms::query()->where('cargo_infos_id', $cargo->id)->first();
        $cargoAccompanyingPerson = AccompanyingPerson::query()->where('cargo_infos_id', $cargo->id)->first();
        $cargo->delete();
        $policyHolder->delete();
        $cargoPayments->delete();
        $cargoAccompanyingPerson->delete();
        return "deleted {$id}!";
    }
}

