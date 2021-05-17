<?php

namespace App\Http\Controllers;

use App\AllProduct;
use App\AllProductInformation;
use App\AllProductsTermsTransh;
use App\Buyer;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Poruchitel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExportController extends Controller
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
        $agents = Agent::query()->get();
        return view('export-gruz.export', compact('agents'));
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

//            //buyers
//            'field_of_activity' => 'required',
//            'address' => 'required',
//            'email_address' => 'required',
//            'telephone' => 'required',
//            'checking_account' => 'required',
//            'inn' => 'required',
//            'mfo' => 'required',
//            'bank' => 'required',
//            'oked' => 'required',
//
//            //poruchitel
//            'legal_address' => 'required',
//            'email_guarantor' => 'required',
//            'telephone_guarantor' => 'required',
//            'guarantor_schet' => 'required',
//            'inn_guarantor' => 'required',
//            'mfo_guarantor' => 'required',
//            'bank_guarantor' => 'required',
//            'oked_guarantor' => 'required',


//            //Policy holder
//            'fio_insurer' => 'required',
//            'address_insurer' => 'required',
//            'tel_insurer' => 'required',
//            'email_insurer' => 'required',
//            'address_schet' => 'required',
//            'inn_insurer' => 'required',
//            'mfo_insurer' => 'required',
//            'oked_insurer' => 'required',
//            'bank_insurer' => 'required',

//            //All_product
//            'unique_number' => 'required',
//            'insurance_from' => 'required',
//            'object_from_date' => 'required',
//            'object_to_date' => 'required',
//            'period_expectation' => 'required',
//            'products_by_contract' => 'required',
//            'select_products_by_contract' => 'required',
//            'reason' => 'required',
//            'country_insurance_coverings' => 'required',
//            'date_shipment' => 'required',
//            'cost_of_shipment' => 'required',
//            'payment_for_buyer' => 'required',
//            'debt' => 'required',
//            'date_summary' => 'required',
//            'short_sum_overdue' => 'required',
//            'tall_sum_overdue' => 'required',
//            'description_reason' => 'required',
//
//            'invoices' => 'required',
//            'experience_with_buyer' => 'required',
//            'overhead' => 'required',
//            'checkout_from_bank' => 'required',
//            'payment_document' => 'required',
//            'demand_document' => 'required',
//            'correspondence' => 'required',
//            'book_sales' => 'required',
//            'unpaid_invoices' => 'required',
//            'details_warranty' => 'required',
//            'damages' => 'required',
//            'disputes' => 'required',
//            'problems' => 'required',
//            'period_condition' => 'required',
//            'warranty_of_trust' => 'required',
//            'reimbursement' => 'required',
//            'claim' => 'required',
//            'agree_with' => 'required',
//            'changes_on_date' => 'required',
//            'dispose_changes' => 'required',
//            'securing_data' => 'required',
//            'requested' => 'required',
//            'received' => 'required',
//            'insurer_warranty' => 'required',
//            'reimbursement_insurer' => 'required',
//            'claim_of_buyer' => 'required',
//            'bank_of_credit' => 'required',
//            'bank_confirm' => 'required',
//            'sum_of_credit' => 'required',
//            'form_of_credit' => 'required',
//            'type_of_credit' => 'required',
//            'insurance_sum' => 'required',
//            'insurance_bonus' => 'required',
//            'franchise' => 'required',
//            'insurance_premium_currency' => 'required',
//            'payment_term' => 'required',
//            'way_of_calculation' => 'required',
//            'application_form_file' => 'required',
//            'contract_file' => 'required',
//            'policy_file' => 'required',
//
//             //all_product_information
//            'policy_series' => 'required',
//            'policy_insurance_from' => 'required',
//            'litso' => 'required',

        ]);

        if ($request->get('payment_term') === "transh") {
            $request->validate([
                "payment_sum_main" => "required",
                "payment_from_main" => "required"
            ]);
        }

        if ($request->tariff === 'tariff') {
            $request->validate([
                'tariff_other' => 'required'
            ]);
        }

        if ($request->preim === 'preim') {
            $request->validate([
                'premiya_other' => 'required'
            ]);
        }

        if ($request->carried_out === "individual") {
            $request->validate([
               'carried_out_info' => 'required'
            ]);
        }
        if ($request->payed === "individual") {
            $request->validate([
                'payed_bonus' => 'required',
            ]);
        }
        if ($request->penalty === "individual") {
            $request->validate([
                'penalties' => 'required',
            ]);
        }
        if ($request->sum_from_all === "individual") {
            $request->validate([
                'payed_sum_shipment' => 'required',
            ]);
        }
        if ($request->cost_invoice === "individual") {
            $request->validate([
                'invoice_price' => 'required',
            ]);
        }
        if ($request->spends === "individual") {
            $request->validate([
                'spending' => 'required',
            ]);
        }


        if ($request->tariff === 'tariff') {
            $request->validate([
                'tariff_other' => 'required'
            ]);
        }

        if ($request->preim === 'preim') {
            $request->validate([
                'premiya_other' => 'required'
            ]);
        }



        $policyHolder = PolicyHolder::create(
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

        if (!empty($request->overhead)) {
            $overhead = $request->overhead->store("documents_overhead");
        } else {
            $overhead = null;
        }
        if (!empty($request->checkout_from_bank)) {
            $checkout_from_bank = $request->checkout_from_bank->store("documents_checkout_from_bank");
        } else {
            $checkout_from_bank = null;
        }
        if (!empty($request->payment_document)) {
            $payment_document = $request->payment_document->store("documents_payment");
        } else {
            $payment_document = null;
        }
        if (!empty($request->demand_document)) {
            $demand_document = $request->demand_document->store("documents_demand");
        } else {
            $demand_document = null;
        }
        if (!empty($request->correspondence)) {
            $correspondence = $request->correspondence->store("documents_correspondence");
        } else {
            $correspondence = null;
        }
        if (!empty($request->book_sales)) {
            $book_sales = $request->book_sales->store("documents_book_sales");
        } else {
            $book_sales = null;
        }
        if (!empty($request->unpaid_invoices)) {
            $unpaid_invoices = $request->unpaid_invoices->store("documents_unpaid_invoices");
        } else {
            $unpaid_invoices = null;
        }
        if (!empty($request->details_warranty)) {
            $details_warranty = $request->details_warranty->store("documents_details_warranty");
        } else {
            $details_warranty = null;
        }
        if (!empty($request->damages)) {
            $damages = $request->damages->store("documents_damages");
        } else {
            $damages = null;
        }

        if (!empty($request->application_form_file)) {
            $application_form_file_path = $request->application_form_file->store("documents_export");
        } else {
            $application_form_file_path = null;
        }
        if (!empty($request->contract_file)) {
            $contract_file_path = $request->contract_file->store("documents_export");
        } else {
            $contract_file_path = null;
        }
        if (!empty($request->policy_file)) {
            $policy_file_path = $request->policy_file->store("documents_export");
        } else {
            $policy_file_path = null;
        }

        $all_product = AllProduct::create([
            'policy_holder_id' => $policyHolder->id,
            'unique_number'=>$request->unique_number,
            'insurance_from'=>$request->insurance_from,
            'object_from_date'=>$request->object_from_date,
            'object_to_date'=>$request->object_to_date,
            'period_expectation'=>$request->period_expectation,
            'products_by_contract'=>$request->products_by_contract,
            'select_products_by_contract'=>$request->select_products_by_contract,
            'reason'=>$request->reason,
            'country_insurance_coverings'=>$request->country_insurance_coverings,
            'date_shipment'=>$request->date_shipment,
            'cost_of_shipment'=>$request->cost_of_shipment,
            'payment_for_buyer'=>$request->payment_for_buyer,
            'debt'=>$request->debt,
            'date_summary'=>$request->date_summary,
            'short_sum_overdue'=>$request->short_sum_overdue,
            'tall_sum_overdue'=>$request->tall_sum_overdue,
            'description_reason'=>$request->description_reason,
            'payed'=>$request->payed,
            'payed_bonus'=>$request->payed_bonus,
            'penalty'=>$request->penalty,
            'penalties'=>$request->penalties,
            'sum_from_all'=>$request->sum_from_all,
            'payed_sum_shipment'=>$request->payed_sum_shipment,
            'cost_invoice'=>$request->cost_invoice,
            'invoice_price'=>$request->invoice_price,
            'spends'=>$request->spends,
            'spending'=>$request->spending,
            'invoices'=>$request->invoices,
            'experience_with_buyer'=>$request->experience_with_buyer,
            'overhead'=>$overhead,
            'checkout_from_bank'=>$checkout_from_bank,
            'payment_document'=>$payment_document,
            'demand_document'=>$demand_document,
            'correspondence'=>$correspondence,
            'book_sales'=>$book_sales,
            'unpaid_invoices'=>$unpaid_invoices,
            'details_warranty'=>$details_warranty,
            'damages'=>$damages,
            'disputes'=>$request->disputes,
            'problems'=>$request->problems,
            'period_condition'=>$request->period_condition,
            'warranty_of_trust'=>$request->warranty_of_trust,
            'reimbursement'=>$request->reimbursement,
            'claim'=>$request->claim,
            'agree_with'=>$request->agree_with,
            'carried_out'=>$request->carried_out,
            'carried_out_info'=>$request->carried_out_info,
            'changes_on_date'=>$request->changes_on_date,
            'dispose_changes'=>$request->dispose_changes,
            'securing_data'=>$request->securing_data,
            'requested'=>$request->requested,
            'received'=>$request->received,
            'insurer_warranty'=>$request->insurer_warranty,
            'reimbursement_insurer'=>$request->reimbursement_insurer,
            'claim_of_buyer'=>$request->claim_of_buyer,
            'bank_of_credit'=>$request->bank_of_credit,
            'bank_confirm'=>$request->bank_confirm,
            'sum_of_credit'=>$request->sum_of_credit,
            'form_of_credit'=>$request->form_of_credit,
            'type_of_credit'=>$request->type_of_credit,
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

        $buyers = Buyer::create([
            'all_products_id' => $all_product->id,
            'field_of_activity'=>$request->field_of_activity,
            'address'=>$request->address,
            'email_address'=>$request->email_address,
            'telephone'=>$request->telephone,
            'checking_account'=>$request->checking_account,
            'inn'=>$request->inn,
            'mfo'=>$request->mfo,
            'bank'=>$request->bank,
            'oked'=>$request->oked,
        ]);

        $poruchitels = Poruchitel::create([
            'all_products_id' => $all_product->id,
            'legal_address'=>$request->legal_address,
            'email_guarantor'=>$request->email_guarantor,
            'telephone_guarantor'=>$request->telephone_guarantor,
            'guarantor_schet'=>$request->guarantor_schet,
            'inn_guarantor'=>$request->inn_guarantor,
            'mfo_guarantor'=>$request->mfo_guarantor,
            'bank_guarantor'=>$request->bank_guarantor,
            'oked_guarantor'=>$request->oked_guarantor
        ]);

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
            'buyers',
            'poruchitel',
            'allProductCurrencyTerms',
            'allProductInfo'
        )->findOrFail($id);
        return view('export-gruz.export_edit', compact('agents', 'all_product'));
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
        $buyers = Buyer::query()->where('all_products_id', $all_product->id)->first();
        $poruchitels = Poruchitel::query()->where('all_products_id', $all_product->id)->first();
        $all_product_info = AllProductInformation::query()->where('all_products_id', $all_product->id)->first();

        $policyHolder->update(
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


        if (!empty($request->overhead)) {
            Storage::delete($all_product->overhead);
            $overhead = $request->overhead->store("documents_overhead");
        } else {
            $overhead = $all_product->overhead;
        }
        if (!empty($request->checkout_from_bank)) {
            Storage::delete($all_product->checkout_from_bank);
            $checkout_from_bank = $request->checkout_from_bank->store("documents_checkout_from_bank");
        } else {
            $checkout_from_bank = $all_product->checkout_from_bank;
        }
        if (!empty($request->payment_document)) {
            Storage::delete($all_product->payment_document);
            $payment_document = $request->payment_document->store("documents_payment");
        } else {
            $payment_document = $all_product->payment_document;
        }
        if (!empty($request->demand_document)) {
            Storage::delete($all_product->demand_document);
            $demand_document = $request->demand_document->store("documents_demand");
        } else {
            $demand_document = $all_product->demand_document;
        }
        if (!empty($request->correspondence)) {
            Storage::delete($all_product->correspondence);
            $correspondence = $request->correspondence->store("documents_correspondence");
        } else {
            $correspondence = $all_product->correspondence;
        }
        if (!empty($request->book_sales)) {
            Storage::delete($all_product->book_sales);
            $book_sales = $request->book_sales->store("documents_book_sales");
        } else {
            $book_sales = $all_product->book_sales;
        }
        if (!empty($request->unpaid_invoices)) {
            Storage::delete($all_product->unpaid_invoices);
            $unpaid_invoices = $request->unpaid_invoices->store("documents_unpaid_invoices");
        } else {
            $unpaid_invoices = $all_product->unpaid_invoices;
        }
        if (!empty($request->details_warranty)) {
            Storage::delete($all_product->details_warranty);
            $details_warranty = $request->details_warranty->store("documents_details_warranty");
        } else {
            $details_warranty = $all_product->details_warranty;
        }
        if (!empty($request->damages)) {
            Storage::delete($all_product->damages);
            $damages = $request->damages->store("documents_damages");
        } else {
            $damages = $all_product->damages;
        }

        if (!empty($request->application_form_file)) {
            Storage::delete($all_product->application_form_file);
            $application_form_file_path = $request->application_form_file->store("documents_export");
        } else {
            $application_form_file_path = $all_product->application_form_file;
        }
        if (!empty($request->contract_file)) {
            Storage::delete($all_product->contract_file);
            $contract_file_path = $request->contract_file->store("documents_export");
        } else {
            $contract_file_path = $all_product->contract_file;
        }
        if (!empty($request->policy_file)) {
            Storage::delete($all_product->policy_file);
            $policy_file_path = $request->policy_file->store("documents_export");
        } else {
            $policy_file_path = $all_product->policy_file;
        }

        $all_product ->update([
            'policy_holder_id' => $policyHolder->id,
            'unique_number'=>$request->unique_number,
            'insurance_from'=>$request->insurance_from,
            'object_from_date'=>$request->object_from_date,
            'object_to_date'=>$request->object_to_date,
            'period_expectation'=>$request->period_expectation,
            'products_by_contract'=>$request->products_by_contract,
            'select_products_by_contract'=>$request->select_products_by_contract,
            'reason'=>$request->reason,
            'country_insurance_coverings'=>$request->country_insurance_coverings,
            'date_shipment'=>$request->date_shipment,
            'cost_of_shipment'=>$request->cost_of_shipment,
            'payment_for_buyer'=>$request->payment_for_buyer,
            'debt'=>$request->debt,
            'date_summary'=>$request->date_summary,
            'short_sum_overdue'=>$request->short_sum_overdue,
            'tall_sum_overdue'=>$request->tall_sum_overdue,
            'description_reason'=>$request->description_reason,
            'payed'=>$request->payed,
            'payed_bonus'=>$request->payed_bonus,
            'penalty'=>$request->penalty,
            'penalties'=>$request->penalties,
            'sum_from_all'=>$request->sum_from_all,
            'payed_sum_shipment'=>$request->payed_sum_shipment,
            'cost_invoice'=>$request->cost_invoice,
            'invoice_price'=>$request->invoice_price,
            'spends'=>$request->spends,
            'spending'=>$request->spending,
            'invoices'=>$request->invoices,
            'experience_with_buyer'=>$request->experience_with_buyer,
            'overhead'=>$overhead,
            'checkout_from_bank'=>$checkout_from_bank,
            'payment_document'=>$payment_document,
            'demand_document'=>$demand_document,
            'correspondence'=>$correspondence,
            'book_sales'=>$book_sales,
            'unpaid_invoices'=>$unpaid_invoices,
            'details_warranty'=>$details_warranty,
            'damages'=>$damages,
            'disputes'=>$request->disputes,
            'problems'=>$request->problems,
            'period_condition'=>$request->period_condition,
            'warranty_of_trust'=>$request->warranty_of_trust,
            'reimbursement'=>$request->reimbursement,
            'claim'=>$request->claim,
            'agree_with'=>$request->agree_with,
            'carried_out'=>$request->carried_out,
            'carried_out_info'=>$request->carried_out_info,
            'changes_on_date'=>$request->changes_on_date,
            'dispose_changes'=>$request->dispose_changes,
            'securing_data'=>$request->securing_data,
            'requested'=>$request->requested,
            'received'=>$request->received,
            'insurer_warranty'=>$request->insurer_warranty,
            'reimbursement_insurer'=>$request->reimbursement_insurer,
            'claim_of_buyer'=>$request->claim_of_buyer,
            'bank_of_credit'=>$request->bank_of_credit,
            'bank_confirm'=>$request->bank_confirm,
            'sum_of_credit'=>$request->sum_of_credit,
            'form_of_credit'=>$request->form_of_credit,
            'type_of_credit'=>$request->type_of_credit,
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

        $buyers ->update([
            'all_products_id' => $all_product->id,
            'field_of_activity'=>$request->field_of_activity,
            'address'=>$request->address,
            'email_address'=>$request->email_address,
            'telephone'=>$request->telephone,
            'checking_account'=>$request->checking_account,
            'inn'=>$request->inn,
            'mfo'=>$request->mfo,
            'bank'=>$request->bank,
            'oked'=>$request->oked,
        ]);

        $poruchitels->update([
            'all_products_id' => $all_product->id,
            'legal_address'=>$request->legal_address,
            'email_guarantor'=>$request->email_guarantor,
            'telephone_guarantor'=>$request->telephone_guarantor,
            'guarantor_schet'=>$request->guarantor_schet,
            'inn_guarantor'=>$request->inn_guarantor,
            'mfo_guarantor'=>$request->mfo_guarantor,
            'bank_guarantor'=>$request->bank_guarantor,
            'oked_guarantor'=>$request->oked_guarantor
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

        return 'Updated successfully!!!';

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
        $buyers = Buyer::query()->where('all_products_id', $all_product->id)->first();
        $poruchitels = Poruchitel::query()->where('all_products_id', $all_product->id)->first();

        $policyHolder->delete();
        $all_product_info->delete();
        $buyers->delete();
        $poruchitels->delete();
        foreach ($currencyTerms as $item) {
            $item->delete();
        }
        $all_product->delete();
        return "success";
    }
}
