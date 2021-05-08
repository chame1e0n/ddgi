<?php

namespace App\Http\Controllers\Product;

use App\AllProduct;
use App\AllProductInformation;
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
            'polis_name_id' => 'required|array', // Наименование полиса
            'polis_series_id' => 'required|array', // Серия полиса
            'data_vidachi' => 'required|array', // Дата выдачи
            'period_deystviya_ot' => 'required|array', // Период действия полиса от
            'period_deystviya_do' => 'required|array', // Период действия полиса до
            'otvet_litso' => 'required|array', // Выбор агента
            'kolichestvo' => 'required|array', // Количество
            'strah_stoimost' => 'required|array', // Страховая стоимость
            'strah_summa' => 'required|array', // Страховая сумма
            'strah_premiya' => 'required|array', // Страховая премия

            //Условия оплаты страховой премии
            'insurance_sum' => 'required|integer',
            'insurance_bonus' => 'required|integer',
            'franchise' => 'required|integer',
            'insurance_premium_currency' => 'required|string',
            'sposob_rascheta' => 'required|integer',

            'payment_term' => 'required|in:transh,1', // транш
            'payment_sum' => 'required_if:payment_term,transh|array', // транш
            'payment_from' => 'required_if:payment_term,transh|array', // транш

            'tarif' => 'nullable', // can be 'on' or nullable
            'tarif_other' => 'required_with:tarif',
            'preim' => 'nullable', // can be 'on' or nullable
            'premiya_other' => 'required_with:preim',

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

        $allProduct = DB::transaction(function () use ($request) {
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

            foreach ($request->input('polis_name_id') as $key => $item) {
                AllProductInformation::create([
                    'policy_id' => 1,
                    'data_vidachi' => $request->input('data_vidachi')[$key],
                    'period_deystviya_ot' => $request->input('period_deystviya_ot')[$key],
                    'period_deystviya_do' => $request->input('period_deystviya_do')[$key],
                    'otvet_litso' => $request->input('otvet_litso')[$key],
                    'kolichestvo' => $request->input('kolichestvo')[$key],
                    'strah_stoimost' => $request->input('strah_stoimost')[$key],
                    'strah_summa' => $request->input('strah_summa')[$key],
                    'strah_premiya' => $request->input('strah_premiya')[$key],
                    'all_products_id' => $allP->id
                ]);
            }

            return $allP;
        });

        return redirect()->route('dobrovolka_imushestvo.edit', $allProduct->id)->withInput()->with([sprintf('Данные успешно добавлены')]);
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
