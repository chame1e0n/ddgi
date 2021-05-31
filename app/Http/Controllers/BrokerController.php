<?php

namespace App\Http\Controllers;

use App\AllProduct;
use App\AllProductInformation;
use App\AllProductInformationTransport;
use App\AllProductsTermsTransh;
use App\Helpers\Convertio\Convertio;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;

class BrokerController extends Controller
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
        return view('products.otvetstvennost.broker.create', compact('agents'));
    }

    public function download($id, $info_id) {
        $all_product = AllProduct::find($id);
        $product_info = AllProductInformation::find($info_id);
        $document = new TemplateProcessor(public_path('teztools/polis.docx'));
        Carbon::setLocale('ru');
        $document->setValues([
            'policy_holder_fio' => $all_product->policyHolder->FIO,
            'policy_holder_address' => $all_product->policyHolder->address,
            'policy_holder_phone_number' => $all_product->policyHolder->phone_number,
            'all_product_insurance_bonus' => $all_product->insurance_bonus,
            'policy_beneficiary_fio' => 'ФИО',
            'policy_holder_mfo' => $all_product->policyHolder->mfo,
            'insurance_to' => Carbon::parse($all_product->insurance_to)->translatedFormat('d F Y'),
            'polis_payload' => $product_info->polis_payload,
            'polis_year' => $product_info->polis_gos_num,
            'polis_gos_num' => $product_info->state_num,
            'num_carcase' => $product_info->num_carcase,
            'insurance_cost' => $product_info->insurance_cost,
            'overall_polis_sum' => $product_info->overall_polis_sum,
        ]);
        $document->saveAs('polis.docx');

        try {
            $API = new Convertio(config('app.convertioKey'));
            $API->start('polis.docx', 'pdf')->wait()->download('polis.pdf')->delete();

            header("Content-type:application/pdf");
            header("Content-Disposition: inline;filename=polis.pdf");
            readfile("polis.pdf");
        } catch (\Exception $e) {
            return redirect('/polis.docx');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
                'phone_number' => $request->phone_insurer,
                'checking_account' => $request->payment_bill,
                'vid_deyatelnosti' => $request->insurer_type_active,
                'inn' => $request->inn_insurer,
                'mfo' => $request->mfo_insurer,
                'bank_id' => $request->bank_insurer,
                'oked' => $request->oked_insurer,
                'okonx' => $request->okonh_insurer,
                'info_personal' => $request->info_personal,
            ]
        );

        if (!empty($request->application_form_file)) {
            $application_form_file_path = $request->application_form_file->store("documents_broker");
        } else {
            $application_form_file_path = null;
        }
        if (!empty($request->contract_file)) {
            $contract_file_path = $request->contract_file->store("documents_broker");
        } else {
            $contract_file_path = null;
        }
        if (!empty($request->policy_file)) {
            $policy_file_path = $request->policy_file->store("documents_broker");
        } else {
            $policy_file_path = null;
        }
        if (!empty($request->retransferAktFile)) {
            $retransferAktFile_path = $request->retransferAktFile->store("documents_broker");
        } else {
            $retransferAktFile_path = null;
        }

        $all_product = AllProduct::create(
            [
                'policy_holder_id' => $policyHolder->id,
                'insurance_from' => $request->insurance_from,
                'insurance_to' => $request->insurance_to,
                'geo_zone' => $request->geo_zone,


                'year_one' => $request->year_one,
                'annual_turnover_one' => $request->annual_turnover_one,
                'net_profit_one' => $request->net_profit_one,
                'year_two' => $request->year_two,
                'annual_turnover_two' => $request->annual_turnover_two,
                'net_profit_two' => $request->net_profit_two,
                'acted' => $request->acted,
                'public_sector_comment' => $request->public_sector_comment,
                'private_sector_comment' => $request->private_sector_comment,
                'professional_risks' => $request->professional_risks,
                'cases' => $request->cases,
                'reason_case' => $request->reason_case,
                'administrative_case' => $request->administrative_case,
                'reason_administrative_case' => $request->reason_administrative_case,
                'sphereOfActivity' => $request->sphereOfActivity,
                'profInsuranceServices' => $request->profInsuranceServices,
                'liabilityLimit' => $request->liabilityLimit,
                'retransferAktFile' => $retransferAktFile_path,

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

        if (!empty($request->all_product_informations)) {
            $all_product_informations = request('all_product_informations', []);
            foreach ($all_product_informations as $info) {
                $info['all_products_id'] = $all_product->id;
                // :TODO: Тут все не верно, нужно понять куда сохранять, нет полей
                $all_product_info = AllProductInformation::create(
                    //$info
                    [
                        'all_products_id' => $all_product->id,
                        'policy_series' => $info['from_date_polis'],
                        'policy_insurance_from' => $info['date_polis_from'],
                    ]
                );
            }
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

        return redirect(route('broker.edit', ['broker' => $all_product]))->with('message', 'Успешно создано');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agents = Agent::query()->get();
        $all_product = AllProduct::query()->with(
            'policyHolder',
            'allProductCurrencyTerms',
            'allProductInfo',
            'allProductInfoTransport'
        )->findOrFail($id);

        return view('products.otvetstvennost.broker.edit', compact('agents', 'all_product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $all_product = AllProduct::query()->find($id);
        $policyHolder = PolicyHolder::query()->find($all_product->policy_holder_id);
        $currency_terms_transh = AllProductsTermsTransh::query()->where('all_products_id', $all_product->id)->first();
        $all_product_info = AllProductInformation::query()->where('all_products_id', $all_product->id)->first();
        $all_product_info_transport = AllProductInformationTransport::query()->where('all_products_id', $all_product->id)->first();

        $policyHolder->update(
            [
                'FIO' => $request->fio_insurer,
                'address' => $request->address_insurer,
                'phone_number' => $request->phone_insurer,
                'checking_account' => $request->payment_bill,
                'vid_deyatelnosti' => $request->insurer_type_active,
                'inn' => $request->inn_insurer,
                'mfo' => $request->mfo_insurer,
                'bank_id' => $request->bank_insurer,
                'oked' => $request->oked_insurer,
                'okonx' => $request->okonh_insurer,
                'info_personal' => $request->info_personal,
            ]
        );

        if (!empty($request->application_form_file)) {
            Storage::delete($all_product->application_form_file_path);
            $application_form_file_path = $request->application_form_file->store("documents_broker");
        } else {
            $application_form_file_path = $all_product->application_form_file;
        }
        if (!empty($request->contract_file)) {
            Storage::delete($all_product->contract_file_path);
            $contract_file_path = $request->contract_file->store("documents_broker");
        } else {
            $contract_file_path = $all_product->contract_file;
        }
        if (!empty($request->policy_file)) {
            Storage::delete($all_product->policy_file_path);
            $policy_file_path = $request->policy_file->store("documents_broker");
        } else {
            $policy_file_path = $all_product->policy_file;
        }
        if (!empty($request->retransferAktFile)) {
            Storage::delete($all_product->retransferAktFile);
            $retransferAktFile_path = $request->retransferAktFile->store("documents_broker");
        } else {
            $retransferAktFile_path = $all_product->retransferAktFile;
        }

        $all_product->update(
            [
                'policy_holder_id' => $policyHolder->id,
                'insurance_from' => $request->insurance_from,
                'insurance_to' => $request->insurance_to,
                'strah_dogovor_ot' => $request->strah_dogovor_ot,
                'strah_dogovor_do' => $request->strah_dogovor_do,
                'geo_zone' => $request->geo_zone,


                'year_one' => $request->year_one,
                'annual_turnover_one' => $request->annual_turnover_one,
                'net_profit_one' => $request->net_profit_one,
                'year_two' => $request->year_two,
                'annual_turnover_two' => $request->annual_turnover_two,
                'net_profit_two' => $request->net_profit_two,
                'activity_period_from' => $request->activity_period_from,
                'activity_period_to' => $request->activity_period_to,
                'acted' => $request->acted,
                'public_sector_comment' => $request->public_sector_comment,
                'private_sector_comment' => $request->private_sector_comment,
                'professional_risks' => $request->professional_risks,
                'cases' => $request->cases,
                'reason_case' => $request->reason_case,
                'administrative_case' => $request->administrative_case,
                'reason_administrative_case' => $request->reason_administrative_case,
                'sphereOfActivity' => $request->sphereOfActivity,
                'profInsuranceServices' => $request->profInsuranceServices,
                'liabilityLimit' => $request->liabilityLimit,
                'retransferAktFile' => $retransferAktFile_path,

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

        if (!empty($request->policy_num)){
            $all_product_info_transport->update([
                'all_products_id' => $all_product->id,
                'policy_num'=>$request->policy_num,
                'policy_series_id'=>$request->policy_series_id,
                'from_date_polis'=>$request->from_date_polis,
                'date_polis_from'=>$request->date_polis_from,
                'date_polis_to'=>$request->date_polis_to,

                'agents'=>$request->agent_id,

                'insurer_fio'=>$request->insurer_fio,
                'specialty'=>$request->specialty,
                'experience'=>$request->experience,
                'position'=>$request->position,
                'time_stay'=>$request->time_stay,
                'insurer_price'=>$request->insurer_price,
                'insurer_sum'=>$request->insurer_sum,
                'insurer_premium'=>$request->insurer_premium,
            ]);
        }

            $all_product_info->update(
                [
                    'all_products_id' => $all_product->id,
                    'policy_series' => $request->policy_series,
                    'policy_insurance_from' => $request->policy_insurance_from,
                    'otvet_litso' => $request->litso,
                ]
            );



        if (!empty($request->payment_sum)){
            $currency_terms_transh = AllProductsTermsTransh::create(
                [
                    'all_products_id' => $all_product->id,
                    'payment_sum' => $request->payment_sum,
                    'payment_from' => $request->payment_from
                ]
            );
        }else{
            $currency_terms_transh->update(
                [
                    'all_products_id' => $all_product->id,
                    'payment_sum' => $request->payment_sum,
                    'payment_from' => $request->payment_from
                ]
            );
        }

        return redirect(route('brokers.edit', ['broker' => $all_product]))->with('message', 'Успешно изменено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $all_product = AllProduct::query()->findOrFail($id);

        $currencyTerms = AllProductsTermsTransh::query()->where('all_products_id', $all_product->id)->get();
        $all_product_info = AllProductInformation::query()->where('all_products_id', $all_product->id)->first();
        $all_product_info_transport = AllProductInformationTransport::query()->where('all_products_id', $all_product->id)->first();
        $policyHolder = PolicyHolder::query()->findOrFail($all_product->policy_holder_id);
        $policyHolder->delete();
        $all_product_info->delete();
        $all_product_info_transport->delete();
        foreach ($currencyTerms as $item) {
            $item->delete();
        }
        $all_product->delete();

        return "success";
    }
}
