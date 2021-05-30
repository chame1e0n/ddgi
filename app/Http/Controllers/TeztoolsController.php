<?php

namespace App\Http\Controllers;

use App\AllProduct;
use App\AllProductInformation;
use App\AllProductInformationTransport;
use App\AllProductsTermsTransh;
use App\Helpers\Convertio\Convertio;
use App\Models\Policy;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;

class TeztoolsController extends Controller
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

        return view('products.avto.teztools.create', compact('agents'));
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
            // policy_holders
//            'fio_insurer' => 'required',
//            'address_insurer' => 'required',
//            'tel_insurer' => 'required',
//            'address_schet' => 'required',
//            'inn_insurer' => 'required',
//            'mfo_insurer' => 'required',
//            'bank_insurer' => 'required',
//            'oked_insurer' => 'required',

            // beneficiary
//            'fio_beneficiary'=> 'required',
//            'address_beneficiary'=> 'required',
//            'tel_beneficiary'=> 'required',
//            'beneficiary_schet'=> 'required',
//            'inn_beneficiary'=> 'required',
//            'mfo_beneficiary'=> 'required',
//            'bank_id'=> 'required',
//            'oked_beneficiary'=> 'required',
//            'nomer_passport'=> 'required',
//            'okonh_beneficiary'=> 'required',
//            'okonh_beneficiary'=> 'required',

            // all_product_information
//            'policy_series' => 'required',
//            'policy_insurance_from' => 'required',
//            'otvet_litso' => 'required',

            // all_products
//            'insurance_sum' => 'required',
//            'insurance_bonus'=> 'required',
//            'franchise'=> 'required',
//            'insurance_premium_currency'=> 'required',
//            'payment_term'=> 'required',
//            'way_of_calculation'=> 'required',
//            'application_form_file'=> 'required',
//            'contract_file'=> 'required',
//            'policy_file'=> 'required',
        ]);

//        if ($request->get('payment_term') === 'transh') {
//            $request->validate([
//                'payment_sum_main' => 'required',
//                'payment_from_main' => 'required',
//            ]);
//        }

//        if ($request->tariff === 'tariff') {
//            $request->validate([
//                'tariff_other' => 'required',
//            ]);
//        }
//
//        if ($request->preim === 'preim') {
//            $request->validate([
//                'premiya_other' => 'required',
//            ]);
//        }

        $policy_holder = PolicyHolder::create($request->policy_holder);
        $policy_beneficiaries = PolicyBeneficiaries::create($request->policy_beneficiary);

        if (!empty($request->application_form_file)) {
            $application_form_file_path = $request->application_form_file->store('documents_teztools');
        } else {
            $application_form_file_path = null;
        }
        if (!empty($request->contract_file)) {
            $contract_file_path = $request->contract_file->store('documents_teztools');
        } else {
            $contract_file_path = null;
        }
        if (!empty($request->policy_file)) {
            $policy_file_path = $request->policy_file->store('documents_teztools');
        } else {
            $policy_file_path = null;
        }

        $all_product_data = array_merge($request->all_product, [
            'policy_holder_id' => $policy_holder->id,
            'policy_beneficiaries_id' => $policy_beneficiaries->id,
            'unique_number' => \uniqid(),
            'application_form_file' => $application_form_file_path,
            'contract_file' => $contract_file_path,
            'policy_file' => $policy_file_path,
        ]);

        $all_product = AllProduct::create($all_product_data);

        if (!empty($request->all_products_terms_transhes)) {
            foreach ($request->all_products_terms_transhes as $all_products_terms_transh_data) {
                $all_products_terms_transh_data['all_products_id'] = $all_product->id;

                AllProductsTermsTransh::create($all_products_terms_transh_data);
            }
        }

        if (!empty($request->all_product_information_transports)) {
            foreach ($request->all_product_information_transports as $all_product_information_transport_data) {
                $all_product_information_transport_data['all_products_id'] = $all_product->id;
                unset($all_product_information_transport_data['data_vidachi']);

                AllProductInformationTransport::create($all_product_information_transport_data);

                $policy = Policy::find($all_product_information_transport_data['polis_model']);
                $policy->update(['status' => 'in_use']);
            }
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

    public function download($id, $info_id) {
        $all_product = AllProduct::find($id);
        $product_info = AllProductInformationTransport::find($info_id);
        $document = new TemplateProcessor(public_path('teztools/polis.docx'));
        Carbon::setLocale('ru');
        $document->setValues([
            'policy_holder_fio' => $all_product->policyHolder->FIO,
            'policy_holder_address' => $all_product->policyHolder->address,
            'policy_holder_phone_number' => $all_product->policyHolder->phone_number,
            'all_product_insurance_bonus' => $all_product->insurance_bonus,
            'policy_beneficiary_fio' => $all_product->policyBeneficiaries->FIO,
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

            //echo "<script>window.open('" . config('app.url') . "/polis.pdf', '_blank').print();</script>";
        } catch (\Exception $e) {
            return redirect('/polis.docx');
        }
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
            'allProductCurrencyTerms',
            'allProductInfo',
            'allProductInfoTransport'
        )->findOrFail($id);

        return view('products.avto.teztools.edit', compact('agents', 'all_product'));
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
        $policy_holder = PolicyHolder::query()->find($all_product->policy_holder_id);
        $policy_beneficiaries = PolicyBeneficiaries::query()->find($all_product->policy_beneficiaries_id);
        $currency_terms_transh = AllProductsTermsTransh::query()->where('all_products_id', $all_product->id)->first();
        $all_product_info_transport = AllProductInformationTransport::query()->where('all_products_id', $all_product->id)->first();

        $policy_holder->update($request->policy_holder);
        $policy_beneficiaries->update($request->policy_beneficiary);

        if (!empty($request->application_form_file)) {
            Storage::delete($all_product->application_form_file_path);

            $application_form_file_path = $request->application_form_file->store('documents_teztools');
        } else {
            $application_form_file_path = $all_product->application_form_file;
        }
        if (!empty($request->contract_file)) {
            Storage::delete($all_product->contract_file_path);

            $contract_file_path = $request->contract_file->store('documents_teztools');
        } else {
            $contract_file_path = $all_product->contract_file;
        }
        if (!empty($request->policy_file)) {
            Storage::delete($all_product->policy_file_path);

            $policy_file_path = $request->policy_file->store('documents_teztools');
        } else {
            $policy_file_path = $all_product->policy_file;
        }

        $all_product_data = array_merge($request->all_product, [
            'policy_holder_id' => $policy_holder->id,
            'policy_beneficiaries_id' => $policy_beneficiaries->id,
            'application_form_file' => $application_form_file_path,
            'contract_file' => $contract_file_path,
            'policy_file' => $policy_file_path,
        ]);

        $all_product->update($all_product_data);

        if (!empty($request->all_product_information_transports)) {
            foreach ($request->all_product_information_transports as $all_product_information_transport_data) {
                if (isset($all_product_information_transport_data['id'])) {
                    $all_product_information_transport = AllProductInformationTransport::find($all_product_information_transport_data['id']);
                    unset($all_product_information_transport_data['data_vidachi'], $all_product_information_transport_data['id']);
                    $all_product_information_transport->update($all_product_information_transport_data);
                } else {
                    $all_product_information_transport_data['all_products_id'] = $all_product->id;
                    unset($all_product_information_transport_data['data_vidachi']);

                    AllProductInformationTransport::create($all_product_information_transport_data);

                    $policy = Policy::find($all_product_information_transport_data['polis_model']);
                    $policy->update(['status' => 'in_use']);
                }
            }
        }

        if (!empty($request->all_products_terms_transhes)) {
            foreach ($request->all_products_terms_transhes as $all_products_terms_transh_data) {
                if (isset($all_products_terms_transh_data['id'])) {
                    $all_products_terms_transh = AllProductsTermsTransh::find($all_products_terms_transh_data['id']);
                    unset($all_products_terms_transh_data['id']);
                    $all_products_terms_transh->update($all_products_terms_transh_data);
                } else {
                    $all_products_terms_transh_data['all_products_id'] = $all_product->id;
                    AllProductsTermsTransh::create($all_products_terms_transh_data);
                }
            }
        }

        return redirect(route('teztools.edit', ['teztool' => $all_product]))->with('message', 'Успешно изменено');
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

        $currency_terms = AllProductsTermsTransh::query()->where('all_products_id', $all_product->id)->get();
        $all_product_info = AllProductInformation::query()->where('all_products_id', $all_product->id)->first();
        $all_product_info_transport = AllProductInformationTransport::query()->where('all_products_id', $all_product->id)->first();
        $policy_holder = PolicyHolder::query()->findOrFail($all_product->policy_holder_id);
        $policy_beneficiaries = PolicyBeneficiaries::query()->find($all_product->policy_beneficiaries_id);

        $policy_holder->delete();
        $policy_beneficiaries->delete();
        $all_product_info->delete();
        $all_product_info_transport->delete();
        foreach ($currency_terms as /* @var $currency_term AllProductInformationTransport */ $currency_term) {
            $currency_term->delete();
        }
        $all_product->delete();

        return 'success';
    }
}
