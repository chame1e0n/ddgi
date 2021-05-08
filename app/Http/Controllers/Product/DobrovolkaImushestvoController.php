<?php

namespace App\Http\Controllers\Product;

use App\AllProduct;
use App\AllProductsTermsTransh;
use App\Http\Controllers\Controller;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class DobrovolkaImushestvoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.dobrovolka_imushestvo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            // Общие сведения
            'fio_insurer' => 'required|string|max:255',
            'address_insurer' => 'required|string|max:255',
            'tel_insurer' => 'required|digits:12', //998909998877
            'address_schet' => 'required|string|max:255',
            'inn_insurer' => 'required|integer',
            'mfo_insurer' => 'required|integer',
            'bank_insurer' => 'required|integer',
            'oked_insurer' => 'required|integer',

            // Выгодоприобретатель
            'fio_beneficiary' => 'required|string|max:255',
            'address_beneficiary' => 'required|string|max:255',
            'tel_beneficiary' => 'required|digits:12',
            'beneficiary_schet' => 'required|integer',
            'inn_beneficiary' => 'required|integer',
            'mfo_beneficiary' => 'required|integer',
            'bank_beneficiary' => 'required|integer',
            'okonh_beneficiary' => 'required|integer',
            'seria_passport' => 'required|string|max:255',
            'nomer_passport' => 'required|integer',

            // Период страхования...
            'ts_osnovanii' => 'required|integer',
            'period_insurance_from' => 'required|date',
            'period_insurance_to' => 'required|date',
            'geo_zone' => 'required|string',

            // Полис
//            'polis_series', // Номер полиса
//            'period_polis', // Серия полиса
//            'polis_id', // Дата выдачи
//            'polis_mark', // Период действия полиса от
//            'polis_model', // Период действия полиса до
//            'polis_modification', // Выбор агента
//            'polis_places', // Наименование
//            'polis_num_body', // Количество
//            'polis_payload', // Страховая стоимость
//            'polis_payload', // Страховая сумма

            //Условия оплаты страховой премии
            'insurance_sum' => 'required|integer',
            'insurance_bonus' => 'required|integer',
            'franchise' => 'required|integer',
            'insurance_premium_currency' => 'required|string',
            'sposob_rascheta' => 'required|integer',

            'payment_term' => 'required|in:transh,1', // транш
            'payment_sum' => 'required_if:payment_term,transh|array', // транш
            'payment_sum.*' => 'required|integer', // транш
            'payment_from' => 'required_if:payment_term,transh|array', // транш
            'payment_from.*' => 'required|date', // транш

            'tarif' => 'nullable', // can be 'on' or nullable
            'tarif_other' => 'required_if:tarif,on|integer',
            'preim' => 'nullable', // can be 'on' or nullable
            'premiya_other' => 'required_if:preim,on|integer',

            'application_form_file' => 'nullable|file',
            'contract_file' => 'nullable|file',
            'policy_file' => 'nullable|file',
        ]);

        if ($request->hasFile('application_form_file')) {
            $file = $request->file('application_form_file')->store('/img/PolicyHolder', 'public');
            $request->application_form_file = $file;
        }
        if ($request->hasFile('contract_file')) {
            $file = $request->file('contract_file')->store('/img/PolicyHolder', 'public');
            $request->contract_file = $file;
        }
        if ($request->hasFile('policy_file')) {
            $file = $request->file('policy_file')->store('/img/PolicyHolder', 'public');
            $request->policy_file = $file;
        }

        DB::transaction(function () use ($request) {
            $ph = PolicyHolder::createPolicyHolders($request);
            $pb = PolicyBeneficiaries::createPolicyBeneficiaries($request);

            $allP = AllProduct::query()->create([
                'ts_osnovanii' => $request->input('ts_osnovanii'),
                'period_insurance_from' => $request->input('period_insurance_from'),
                'period_insurance_to' => $request->input('period_insurance_to'),
                'geo_zone' => $request->input('geo_zone'),
                'insurance_sum' => $request->input('insurance_sum'),
                'insurance_bonus' => $request->input('insurance_bonus'),
                'franchise' => $request->input('franchise'),
                'insurance_premium_currency' => $request->input('insurance_premium_currency'),
                'sposob_rascheta' => $request->input('sposob_rascheta'),
                'tarif_other' => $request->has('tarif') ? $request->input('tarif_other') : null,
                'premiya_other' => $request->has('preim') ? $request->input('premiya_other') : null,
                'policy_holder_id' => $ph->id,
                'policy_beneficiaries_id' => $pb->id,
                'application_form_file' => $request->hasFile('application_form_file') ? $request->application_form_file : null,
                'contract_file' => $request->hasFile('contract_file') ? $request->contract_file : null,
                'policy_file' => $request->hasFile('policy_file') ? $request->policy_file : null,
            ]);

            if ($request->input('payment_term') == 'transh') {
                foreach ($request->input('payment_sum') as $key => $value) {
                    AllProductsTermsTransh::create([
                        'payment_sum' => $request->input('payment_sum')[$key],
                        'payment_from' => $request->input('payment_from')[$key],
                        'all_products_id' => $allP->id
                    ]);
                }
            }
        });
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
