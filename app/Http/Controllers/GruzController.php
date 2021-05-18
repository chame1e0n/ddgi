<?php

namespace App\Http\Controllers;

use App\AllProduct;
use App\AllProductFollower;
use App\AllProductInformation;
use App\AllProductsTermsTransh;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GruzController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Bank::query()->get();
        $agents = Agent::query()->get();
        return view('gruz.gruz_create', compact('agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
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
//            //All_product
//            'client_type_radio' => 'required',
//            'product_id' => 'required',
//            'dogovor_lizing_num' => 'required',
//            'insurance_from' => 'required',
//            'sending_point' => 'required',
//            'point_destination' => 'required',
//            'geo_zone' => 'required',
//            'point_overloads' => 'required',
//            'insurance_countries' => 'required',
//            'location_of_cargo' => 'required',
//            'name_of_cargo' => 'required',
//            'type_of_cargo' => 'required',
//            'type_packaging' => 'required',
//            'weight_of_cargo' => 'required',
//            'amount_of_cargo' => 'required',
//            'type_of_transport' => 'required',
//            'qualities_of_cargo' => 'required',
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
//            'way_of_calculation' => 'required',
//            'application_form_file' => 'required',
//            'contract_file' => 'required',
//            'policy_file' => 'required',



//            //all_product_information
//            'policy_series' => 'required',
//            'policy_insurance_from' => 'required',
//            'otvet_litso' => 'required',
        ]);

        if ($request->get('insurance_premium_currency') === "other") {
            $request->validate([
                "payment_sum_main" => "required",
                "payment_from_main" => "required"
            ]);
        }

        $policyHolder = PolicyHolder::create(
            [
                'FIO' => $request->fio_insurer,
                'address' => $request->address_insurer,
                'phone_number' => $request->tel_insurer,
                'email_insurer' => $request->email_insurer,
                'checking_account' => $request->address_schet,
                'inn' => $request->inn_insurer,
                'mfo' => $request->mfo_insurer,
                'bank_id' => $request->bank_insurer,
                'oked' => $request->oked_insurer,
            ]
        );
        $policyBeneficiaries = PolicyBeneficiaries::create([
            'FIO' => $request->fio_beneficiary,
            'address' => $request->address_beneficiary,
            'phone_number' => $request->tel_beneficiary,
            'email_beneficiary' => $request->email_beneficiary,
            'checking_account' => $request->checking_account,
            'inn' => $request->inn_beneficiary,
            'mfo' => $request->mfo_beneficiary,
            'bank_id' => $request->bank_beneficiary,
            'oked' => $request->oked_beneficiary,
        ]);

        $accompanying_file_path = (!empty($request->accompanying_file)) ? $request->accompanying_file->store("cargoDocuments") : null;
        $application_form_file_path = (!empty($request->application_form_file)) ? $request->application_form_file->store("cargoDocuments") : null;
        $contract_file_path = (!empty($request->contract_file)) ? $request->contract_file->store("cargoDocuments") : null;
        $policy_file_path = (!empty($request->policy_file)) ? $request->policy_file->store("cargoDocuments") : null;

        $all_product = AllProduct::create([
            'policy_holder_id' => $policyHolder->id,
            'policy_beneficiaries_id' => $policyBeneficiaries->id,
            'dogovor_lizing_num' => $request->dogovor_lizing_num,
            'insurance_from' => $request->insurance_from,
            'sending_point' => $request->sending_point,
            'point_destination' => $request->point_destination,
            'geo_zone' => $request->geo_zone,
            'point_overloads' => $request->point_overloads,
            'insurance_countries' => $request->insurance_countries,
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
            'object_from_date' => $request->object_from_date,
            'object_to_date' => $request->object_to_date,
            'packaging_period_from' => $request->packaging_period_from,
            'packaging_period_to' => $request->packaging_period_to,
            'condition_insurance' => $request->condition_insurance,
            'accompanying_file' => $accompanying_file_path,
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
            'application_form_file' => $application_form_file_path,
            'contract_file' => $contract_file_path,
            'policy_file' => $policy_file_path
        ]);

        $all_product_info = AllProductInformation::create(
            [
                'all_products_id' => $all_product->id,
                'policy_series' => $request->policy_series,
                'policy_insurance_from' => $request->policy_insurance_from,
                'otvet_litso' => $request->otvet_litso
            ]
        );

            $cargoAccompanyingPerson = AllProductFollower::create([
                'all_products_id' => $all_product->id,
                'name' => $request->name,
                'position' => $request->position,
            ]);

        $currency_terms_transh = AllProductsTermsTransh::create(
            [
                'all_products_id' => $all_product->id,
                'payment_sum' => $request->payment_sum,
                'payment_from' => $request->payment_from
            ]
        );
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
        $agents = Agent::query()->get();
        $all_product = AllProduct::query()->with(
            'policyHolder',
            'policyBeneficiaries',
            'allproductFollower',
            'allProductCurrencyTerms',
            'allProductInfo'
        )->findOrFail($id);
        return view('gruz.gruz_edit', compact('agents', 'all_product'));
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
        $currencyTerms = AllProductsTermsTransh::query()->where('all_products_id', $all_product->id)->first();
        $cargoAccompanyingPerson = AllProductFollower::query()->where('all_products_id', $all_product->id)->first();
        $all_product_info = AllProductInformation::query()->where('all_products_id', $all_product->id)->first();

        $policyHolder ->update(
            [
                'FIO' => $request->fio_insurer,
                'address' => $request->address_insurer,
                'email_insurer' => $request->email_insurer,
                'phone_number' => $request->tel_insurer,
                'checking_account' => $request->address_schet,
                'inn' => $request->inn_insurer,
                'mfo' => $request->mfo_insurer,
                'bank_id' => $request->bank_insurer,
                'oked' => $request->oked_insurer,
            ]
        );
        $policyBeneficiaries ->update([
            'FIO' => $request->fio_beneficiary,
            'address' => $request->address_beneficiary,
            'phone_number' => $request->tel_beneficiary,
            'email_beneficiary' => $request->email_beneficiary,
            'checking_account' => $request->checking_account,
            'inn' => $request->inn_beneficiary,
            'mfo' => $request->mfo_beneficiary,
            'bank_id' => $request->bank_beneficiary,
            'oked' => $request->oked_beneficiary,
        ]);



        if (!empty($request->accompanying_file)) {
            $accompanying_file_path = $request->accompanying_file->store("pictures");
            Storage::delete($all_product->accompanying_file_path);
        } else {
            $accompanying_file_path = $all_product->accompanying_file_path;
        }
        if (!empty($request->contract_file)) {
            $contract_file_path = $request->contract_file->store("pictures");
            Storage::delete($all_product->contract_file_path);
        } else {
            $contract_file_path = $all_product->contract_file_path;
        }
        if (!empty($request->policy_file)) {
            $policy_path = $request->policy_file->store("pictures");
            Storage::delete($all_product->policy_path);
        } else {
            $policy_path = $all_product->policy_path;
        }
        if (!empty($request->application_form_file)) {
            $application_form_path = $request->application_form_file->store("pictures");
            Storage::delete($all_product->application_form_file_path);
        } else {
            $application_form_path = $all_product->application_form_file_path;
        }

        $all_product ->update([
            'policy_holder_id' => $policyHolder->id,
            'policy_beneficiaries_id' => $policyBeneficiaries->id,
            'dogovor_lizing_num' => $request->dogovor_lizing_num,
            'insurance_from' => $request->insurance_from,
            'sending_point' => $request->sending_point,
            'point_destination' => $request->point_destination,
            'geo_zone' => $request->geo_zone,
            'point_overloads' => $request->point_overloads,
            'insurance_countries' => $request->insurance_countries,
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
            'object_from_date' => $request->object_from_date,
            'object_to_date' => $request->object_to_date,
            'packaging_period_from' => $request->packaging_period_from,
            'packaging_period_to' => $request->packaging_period_to,
            'condition_insurance' => $request->condition_insurance,
            'accompanying_file' => $accompanying_file_path,
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
            'application_form_file' => $application_form_path,
            'contract_file' => $contract_file_path,
            'policy_file' => $policy_path
        ]);

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

        if (!empty($cargoAccompanyingPerson)) {
            $cargoAccompanyingPerson->update([
                'all_products_id' => $all_product->id,
                'name' => $request->name,
                'position' => $request->position,
            ]);
        }

        return "Updated successfully!!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banks = Bank::query()->get();
        $all_product = AllProduct::query()->findOrFail($id);

        $currencyTerms = AllProductsTermsTransh::query()->where('all_products_id', $all_product->id)->get();
        $all_product_info = AllProductInformation::query()->where('all_products_id', $all_product->id)->first();
        $policyHolder = PolicyHolder::query()->findOrFail($all_product->policy_holder_id);
        $policyBeneficiaries = PolicyBeneficiaries::query()->find($all_product->policy_beneficiaries_id);
        $cargoAccompanyingPerson = AllProductFollower::query()->where('all_products_id', $all_product->id)->first();

        $policyHolder->delete();
        $all_product_info->delete();
        $policyBeneficiaries->delete();
        $cargoAccompanyingPerson->delete();
        foreach ($currencyTerms as $item) {
            $item->delete();
        }
        $all_product->delete();
        return "success";
    }
}
