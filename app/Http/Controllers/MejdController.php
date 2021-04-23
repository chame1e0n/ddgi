<?php

namespace App\Http\Controllers;

use App\AllProduct;
use App\AllProductInformation;
use App\AllProductsTermsTransh;
use App\MejdCurrencyTermsTransh;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MejdController extends Controller
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
        return view('products.neshchastka.mejd_create');
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
//            // policy_holders
//            'fio_insurer' => 'required',
//            'address_insurer' => 'required',
//            'tel_insurer' => 'required',
//            'address_schet' => 'required',
//            'inn_insurer' => 'required',
//            'mfo_insurer' => 'required',
//            'bank_insurer' => 'required',
//            'oked_insurer' => 'required',
//            'okonh_insurer' => 'required',
//
//
//            //all_products
//            'fio_insurer' => 'required',
//            'sum_of_insurance' => 'required',
//            'bonus' => 'required',
//            'insurance_sum' => 'required',
//            'insurance_bonus'=> 'required',
//            'franchise'=> 'required',
//            'insurance_premium_currency'=> 'required',
//            'payment_term'=> 'required',
//            'way_of_calculation'=> 'required',
//            'application_form_file'=> 'required',
//            'contract_file'=> 'required',
//            'policy_file'=> 'required',
//
//
//            //all_products_informations
//            'policy_series'=> 'required',
//            'policy_insurance_from'=> 'required',
//            'person'=> 'required',
//
//        ]);


//        if (!$request->tarif === "null"){
//            $request->validate([
//                'percent_of_tariff'=>'required',
//            ]);
//        }


        if ($request->get('payment_term') === "transh"){
          $request->validate([
                "payment_sum_main" => "required",
                "payment_from_main" => "required"
            ]);
       }

        $policyHolder = PolicyHolder::create([
            'FIO' => $request->fio_insurer,
            'address' => $request->address_insurer,
            'phone_number' => $request->tel_insurer,
            'checking_account' => $request->address_schet,
            'inn' => $request->inn_insurer,
            'mfo' => $request->mfo_insurer,
            'bank_id' => $request->bank_insurer,
            'oked' => $request->oked_insurer,
            'okonx' => $request->okonh_insurer,
        ]);

        if (!empty($request->application_form_file)) {
            $application_form_file_path = $request->application_form_file->store("documents_mejd");
        } else {
            $application_form_file_path = null;
        }
        if (!empty($request->contract_file)) {
            $contract_file_path = $request->contract_file->store("documents_mejd");
        } else {
            $contract_file_path = null;
        }
        if (!empty($request->policy_file)) {
            $policy_file_path = $request->policy_file->store("documents_mejd");
        } else {
            $policy_file_path = null;
        }

        $all_product = AllProduct::create([
            'policy_holder_id' => $policyHolder->id,
            'fio_insured'=> $request->fio_insured,
            'sum_of_insurance'=> $request->sum_of_insurance,
            'bonus'=> $request->bonus,
            'tariff' => $request->tarif,
            'percent_of_tariff' => $request->percent_of_tariff,
            'insurance_sum'=> $request->insurance_sum,
            'insurance_bonus'=> $request->insurance_bonus,
            'franchise'=> $request->franchise,
            'insurance_premium_currency'=> $request->insurance_premium_currency,
            'payment_term'=> $request->payment_term,
            'payment_sum_main' => $request->payment_sum_main,
            'payment_from_main' => $request->payment_from_main,
            'way_of_calculation'=> $request->way_of_calculation,
            'application_form_file' => $application_form_file_path,
            'contract_file' => $contract_file_path,
            'policy_file' => $policy_file_path,
        ]);

        $all_product_info = AllProductInformation::create([
            'all_products_id' => $all_product->id,
            'policy_series' => $request->policy_series,
            'policy_insurance_from' => $request->policy_insurance_from,
            'person' => $request->person
        ]);

        $currency_terms_mejd = AllProductsTermsTransh::create([
            'all_products_id' => $all_product->id,
            'payment_sum'=>$request->payment_sum,
            'payment_from'=>$request->payment_from
        ]);
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
        $banks = Bank::query()->get();
        $all_product = AllProduct::query()->with('policyHolder', 'allProductCurrencyTerms','allProductInfo')->findOrFail($id);
        return view('products.neshchastka.edit',compact('all_product', 'banks'));
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
        $currencyTerms = AllProductsTermsTransh::query()->where('all_products_id', $all_product->id)->first();
        $all_product_info = AllProductInformation::query()->where('all_products_id', $all_product->id)->first();

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

        if (!empty($request->application_form_file)) {
            Storage::delete($all_product->application_form_file_path);
            $application_form_file_path = $request->application_form_file->store("documents_mejd_edit");
        } if(empty($request->application_form_file)) {
        $application_form_file_path = $all_product->application_form_file;
    }
        if (!empty($request->contract_file)) {
            Storage::delete($all_product->contract_file_path);
            $contract_file_path = $request->contract_file->store("documents_mejd_edit");
        } else {
            $contract_file_path = $all_product->contract_file;
        }
        if (!empty($request->policy_file)) {
            Storage::delete($all_product->policy_file_path);
            $policy_file_path = $request->policy_file->store("documents_mejd_edit");
        } else {
            $policy_file_path = $all_product->policy_file;
        }

        $all_product->update([
            'policy_holder_id' => $policyHolder->id,
            'fio_insured'=> $request->fio_insured,
            'sum_of_insurance'=> $request->sum_of_insurance,
            'bonus'=> $request->bonus,
            'tariff' => $request->tarif,
            'percent_of_tariff' => $request->percent_of_tariff,
            'insurance_sum'=> $request->insurance_sum,
            'insurance_bonus'=> $request->insurance_bonus,
            'franchise'=> $request->franchise,
            'insurance_premium_currency'=> $request->insurance_premium_currency,
            'payment_term'=> $request->payment_term,
            'payment_sum_main' => $request->payment_sum_main,
            'payment_from_main' => $request->payment_from_main,
            'way_of_calculation'=> $request->way_of_calculation,
            'application_form_file' => $application_form_file_path,
            'contract_file' => $contract_file_path,
            'policy_file' => $policy_file_path,
        ]);


                $currencyTerms->update([
                    'all_products_id' => $all_product->id,
                    'payment_sum' => $request->get('payment_sum'),
                    'payment_from' => $request->get('payment_from')
                ]);


        $all_product_info->update([
            'all_products_id' => $all_product->id,
            'policy_series' => $request->policy_series,
            'policy_insurance_from' => $request->policy_insurance_from,
            'person' => $request->person
        ]);
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
        $policyHolder->delete();
        $all_product_info->delete();
        foreach ($currencyTerms as $item) {
            $item->delete();
        }
        $all_product->delete();
        return "success";
    }
}