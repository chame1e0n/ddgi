<?php

namespace App\Http\Controllers\Product3777;

use App\Http\Controllers\Controller;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Bank;
use App\Product3777;
use App\Zaemshik;
use Illuminate\Http\Request;
use Mnvx\EloquentPrintForm\PrintFormProcessor;

class Product3777Controller extends Controller
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
     */
    public function create()
    {
        $banks = Bank::query()->get();
        return view('products.product3777.create', compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'fio_insurer' => 'required',
            'address_insurer' => 'required',
            'tel_insurer' => 'required',
            'address_schet' => 'required',
            'inn_insurer' => 'required',
            'mfo_insurer' => 'required',
            'oked_insurer' => 'required',
            'bank_insurer' => 'required',

            'fio_beneficiary' => 'required',
            'address_beneficiary' => 'required',
            'tel_beneficiary' => 'required',
            'passport_beneficiary' => 'required',
            'passport_num_beneficiary' => 'required',

            'dogovor_lizing_num' => 'required',
            'insurance_from' => 'required',
            'insurance_to' => 'required',
            'insurance_aim' => 'required',
            'insurance_sum' => 'required',
            'currency' => 'required',
            'franshiza' => 'required',
            'object_from_date' => 'required',
            'object_to_date' => 'required',
            'other_info' => 'required',
            'insurance_total_sum' => 'required',
            'insurance_gift' => 'required',
            'payment_currency' => 'required',
            'payment_term' => 'required',
            'polis_series' => 'required',
            'polis_from' => 'required',
            'litso' => 'required',
            'passport_copy' => 'required',
            'dogovor_copy' => 'required',
            'spravka_copy' => 'required',
            'other' => 'required',
        ]);

        $policyHolder = PolicyHolder::create([
            'FIO' => $request->fio_insurer,
            'address' => $request->address_insurer,
            'phone_number' => $request->tel_insurer,
            'checking_account' => $request->address_schet,
            'inn' => $request->inn_insurer,
            'mfo' => $request->mfo_insurer,
            'oked' => $request->oked_insurer,
            'bank_id' => $request->bank_insurer,
        ]);

        $zaemshik = Zaemshik::create([
            'FIO' => $request->fio_beneficiary,
            'address' => $request->address_beneficiary,
            'tel' => $request->tel_beneficiary,
            'passport' => $request->passport_beneficiary,
            'passport_num' => $request->passport_num_beneficiary,
        ]);
        $passport_copy_path = $request->passport_copy->store("documents");
        $dogovor_copy_path = $request->dogovor_copy->store("documents");
        $spravka_copy_path = $request->spravka_copy->store("documents");
        $other_path = $request->other->store("documents");
        $product3777 = Product3777::create([
            'policy_holder_id' => $policyHolder->id,
            'zaemshik_id' => $zaemshik->id,
            'dogovor_lizing_num' => $request->dogovor_lizing_num,
            'insurance_from' => $request->insurance_from,
            'insurance_to' => $request->insurance_to,
            'insurance_aim' => $request->insurance_aim,
            'insurance_sum' => $request->insurance_sum,
            'currency' => $request->currency,
            'franshiza' => $request->franshiza,
            'object_from_date' => $request->object_from_date,
            'object_to_date' => $request->object_to_date,
            'other_info' => $request->other_info,
            'insurance_total_sum' => $request->insurance_total_sum,
            'insurance_gift' => $request->insurance_gift,
            'payment_currency' => $request->payment_currency,
            'payment_term' => $request->payment_term,
            'polis_series' => $request->polis_series,
            'polis_from' => $request->polis_from,
            'litso' => $request->litso,
            'passport_copy' => $passport_copy_path,
            'dogovor_copy' => $dogovor_copy_path,
            'spravka_copy' => $spravka_copy_path,
            'other' => $other_path,
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
     */
    public function edit($id)
    {
        $product = Product3777::query()->with('policyHolder', 'zaemshik')->findOrFail($id);
//        dd($product);
        $banks = Bank::query()->get();
        return view("products.product3777.edit", compact("product", "banks"));
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
//        dd($request->except('client_type_radio', 'product_id'));
        $request->validate([
            'fio_insurer' => 'required',
            'address_insurer' => 'required',
            'tel_insurer' => 'required',
            'address_schet' => 'required',
            'inn_insurer' => 'required',
            'mfo_insurer' => 'required',
            'oked_insurer' => 'required',
            'bank_insurer' => 'required',

            'fio_beneficiary' => 'required',
            'address_beneficiary' => 'required',
            'tel_beneficiary' => 'required',
            'passport_beneficiary' => 'required',
            'passport_num_beneficiary' => 'required',

            'dogovor_lizing_num' => 'required',
            'insurance_from' => 'required',
            'insurance_to' => 'required',
            'insurance_aim' => 'required',
            'insurance_sum' => 'required',
            'currency' => 'required',
            'franshiza' => 'required',
            'object_from_date' => 'required',
            'object_to_date' => 'required',
            'other_info' => 'required',
            'insurance_total_sum' => 'required',
            'insurance_gift' => 'required',
            'payment_currency' => 'required',
            'payment_term' => 'required',
            'polis_series' => 'required',
            'polis_from' => 'required',
            'litso' => 'required'
        ]);
        $product = Product3777::query()->findOrFail($id);
        $policyHolder = PolicyHolder::query()->findOrFail($product->policy_holder_id);
        $zaemshik = Zaemshik::query()->findOrFail($product->zaemshik_id);

        $policyHolder->update([
            'FIO' => $request->fio_insurer,
            'address' => $request->address_insurer,
            'phone_number' => $request->tel_insurer,
            'checking_account' => $request->address_schet,
            'inn' => $request->inn_insurer,
            'mfo' => $request->mfo_insurer,
            'oked' => $request->oked_insurer,
            'bank_id' => $request->bank_insurer,
        ]);

        $zaemshik->update([
            'FIO' => $request->fio_beneficiary,
            'address' => $request->address_beneficiary,
            'tel' => $request->tel_beneficiary,
            'passport' => $request->passport_beneficiary,
            'passport_num' => $request->passport_num_beneficiary,
        ]);
//        $arr = [$passport_copy = null, $dogovor_copy = null, $spravka_copy = null, $other = null];
//        foreach ($arr as $value) {
//            if (!empty($request->$value)) {
//                $value = $request->$value->store("documents");
//            } else {
//                $value = $product->$value;
//            }
//        }
        if (!empty($request->passport_copy)) {
            $passport_copy_path = $request->passport_copy->store("documents");
        } else {
            $passport_copy_path = $product->passport_copy;
        }

        if (!empty($request->$request->dogovor_copy)) {
            $dogovor_copy_path = $request->dogovor_copy->store("documents");
        } else {
            $dogovor_copy_path = $product->dogovor_copy;
        }

        if (!empty($request->spravka_copy)) {
            $spravka_copy_path = $request->spravka_copy->store("documents");
        } else {
            $spravka_copy_path = $product->spravka_copy;
        }

        if (!empty($request->other)) {
            $other_path = $request->other->store("documents");
        } else {
            $other_path = $product->other;
        }


        $product->update([
            'policy_holder_id' => $policyHolder->id,
            'zaemshik_id' => $zaemshik->id,
            'dogovor_lizing_num' => $request->dogovor_lizing_num,
            'insurance_from' => $request->insurance_from,
            'insurance_to' => $request->insurance_to,
            'insurance_aim' => $request->insurance_aim,
            'insurance_sum' => $request->insurance_sum,
            'currency' => $request->currency,
            'franshiza' => $request->franshiza,
            'object_from_date' => $request->object_from_date,
            'object_to_date' => $request->object_to_date,
            'other_info' => $request->other_info,
            'insurance_total_sum' => $request->insurance_total_sum,
            'insurance_gift' => $request->insurance_gift,
            'payment_currency' => $request->payment_currency,
            'payment_term' => $request->payment_term,
            'polis_series' => $request->polis_series,
            'polis_from' => $request->polis_from,
            'litso' => $request->litso,
            'passport_copy' => $passport_copy_path,
            'dogovor_copy' => $dogovor_copy_path,
            'spravka_copy' => $spravka_copy_path,
            'other' => $other_path,
        ]);

        return 'Успешно обновлен продукт Product 3777';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product3777::destroy($id);
        return 'Успешно обновлен удалень Product 3777';
    }

    public function print($id)
    {
        $product = Product3777::query()->with('policyHolder', 'zaemshik')->findOrFail($id);
        $entity = $product;
        $date = $product->insurance_from;
        $date_object_from = $product->object_from_date;
        $date_object_to = $product->object_to_date;
        $time = strtotime($date);
        $time_object_from = strtotime($date_object_from);
        $time_object_to = strtotime($date_object_to);

        //////insurance_from
        $day = date('d', $time);
        $month = date('m', $time);
        $year = date('y', $time);

        //////object_date_from
        $day_object_from = date('d', $time_object_from);
        $month_object_from = date('m', $time_object_from);
        $year_object_from = date('y', $time_object_from);

        //////object_date_to
        $day_object_to = date('d', $time_object_to);
        $month_object_to = date('m', $time_object_to);
        $year_object_to = date('y', $time_object_to);

        ///////insurance_from
        $entity->day_of_insurance = $day;
        $entity->month_of_insurance = $month;
        $entity->year_of_insurance = $year;

        //////object_date_from
        $entity->day_of_object = $day_object_from;
        $entity->month_of_object = $month_object_from;
        $entity->year_of_object = $year_object_from;

        //////object_date_to
        $entity->day_of_object_to = $day_object_to;
        $entity->month_of_object_to = $month_object_to;
        $entity->year_of_object_to = $year_object_to;

        $printFormProcessor = new PrintFormProcessor();
        $templateFile = resource_path('product3777\document.docx');
        $tempFileName = $printFormProcessor->process($templateFile, $entity);
        $fileName = 'product3777_' . $id;
        return response()->download($tempFileName, $fileName . '.docx')->deleteFileAfterSend();
    }
}
