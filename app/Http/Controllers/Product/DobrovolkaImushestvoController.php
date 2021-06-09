<?php

namespace App\Http\Controllers\Product;

use App\AllProduct;
use App\AllProductInformation;
use App\AllProductsTermsTransh;
use App\Http\Controllers\Controller;
use App\Model\Beneficiary;
use App\Model\Client;
use App\Model\Contract;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $beneficiary = new Beneficiary();
        $client = new Client();
        $contract = new Contract();

        return view('products.dobrovolka_imushestvo.create', compact('beneficiary', 'client', 'contract'));
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
            'tel_insurer' => 'required|digits:12',          // 998909998877
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
            'okonx_beneficiary' => 'required|integer',
            'seria_passport' => 'required|string|max:255',
            'nomer_passport' => 'required|integer',

            // Период страхования...
            'ts_osnovanii' => 'required|integer',
            'period_insurance_from' => 'required|date',
            'period_insurance_to' => 'required|date',
            'geo_zone' => 'required|string',

            // Полис
            'polis_name_id' => 'required|array',        // Наименование полиса
            'polis_series_id' => 'required|array',      // Серия полиса
            'data_vidachi' => 'required|array',         // Дата выдачи
            'period_deystviya_ot' => 'required|array',  // Период действия полиса от
            'period_deystviya_do' => 'required|array',  // Период действия полиса до
            'otvet_litso' => 'required|array',          // Выбор агента
            'kolichestvo' => 'required|array',          // Количество
            'strah_stoimost' => 'required|array',       // Страховая стоимость
            'strah_summa' => 'required|array',          // Страховая сумма
            'strah_premiya' => 'required|array',        // Страховая премия

            // Условия оплаты страховой премии
            'insurance_sum' => 'required|integer',
            'insurance_bonus' => 'required|integer',
            'franchise' => 'required|integer',
            'insurance_premium_currency' => 'required|string',
            'sposob_rascheta' => 'required|integer',

            'payment_term' => 'required|in:transh,1',                   // транш
            'payment_sum' => 'required_if:payment_term,transh|array',   // транш
            'payment_from' => 'required_if:payment_term,transh|array',  // транш

            'tarif' => 'nullable',                  // can be 'on' or nullable
            'tarif_other' => 'required_with:tarif',
            'preim' => 'nullable',                  // can be 'on' or nullable
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

        $all_product = DB::transaction(function () use ($request) {
            $ph = PolicyHolder::createPolicyHolders($request);
            $pb = PolicyBeneficiaries::createPolicyBeneficiaries($request);

            $all_p = AllProduct::query()->create([
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
                    AllProductsTermsTransh::query()->create([
                        'payment_sum' => $request->input('payment_sum')[$key],
                        'payment_from' => $request->input('payment_from')[$key],
                        'all_products_id' => $all_p->id,
                    ]);
                }
            }

            foreach ($request->input('polis_name_id') as $key => $item) {
                AllProductInformation::query()->create([
                    'policy_id' => $request->input('polis_series_id')[$key],
                    'data_vidachi' => $request->input('data_vidachi')[$key],
                    'period_deystviya_ot' => $request->input('period_deystviya_ot')[$key],
                    'period_deystviya_do' => $request->input('period_deystviya_do')[$key],
                    'otvet_litso' => $request->input('otvet_litso')[$key],
                    'kolichestvo' => $request->input('kolichestvo')[$key],
                    'strah_stoimost' => $request->input('strah_stoimost')[$key],
                    'strah_summa' => $request->input('strah_summa')[$key],
                    'strah_premiya' => $request->input('strah_premiya')[$key],
                    'all_products_id' => $all_p->id,
                ]);
            }

            return $all_p;
        });

        return redirect()->route('dobrovolka_imushestvo.edit', $all_product->id)->withInput()->with([sprintf('Данные успешно добавлены')]);
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
        $product = AllProduct::query()->with('policyHolder', 'policyBeneficiaries')->find($id);

        return view('products.dobrovolka_imushestvo.edit', compact('product'));
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
        $this->validate($request, [
            // Общие сведения
            'fio_insurer' => 'required|string|max:255',
            'address_insurer' => 'required|string|max:255',
            'tel_insurer' => 'required|digits:12',          // 998909998877
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
            'okonx_beneficiary' => 'required|integer',
            'seria_passport' => 'required|string|max:255',
            'nomer_passport' => 'required|integer',

            // Период страхования...
            'ts_osnovanii' => 'required|integer',
            'period_insurance_from' => 'required|date',
            'period_insurance_to' => 'required|date',
            'geo_zone' => 'required|string',

            // Полис
            'polis_name_id' => 'required|array',        // Наименование полиса
            'polis_series_id' => 'required|array',      // Серия полиса
            'data_vidachi' => 'required|array',         // Дата выдачи
            'period_deystviya_ot' => 'required|array',  // Период действия полиса от
            'period_deystviya_do' => 'required|array',  // Период действия полиса до
            'otvet_litso' => 'required|array',          // Выбор агента
            'kolichestvo' => 'required|array',          // Количество
            'strah_stoimost' => 'required|array',       // Страховая стоимость
            'strah_summa' => 'required|array',          // Страховая сумма
            'strah_premiya' => 'required|array',        // Страховая премия

            // Условия оплаты страховой премии
            'insurance_sum' => 'required|integer',
            'insurance_bonus' => 'required|integer',
            'franchise' => 'required|integer',
            'insurance_premium_currency' => 'required|string',
            'sposob_rascheta' => 'required|integer',

            'payment_term' => 'required|in:transh,1',                   // транш
            'payment_sum' => 'required_if:payment_term,transh|array',   // транш
            'payment_from' => 'required_if:payment_term,transh|array',  // транш

            'tarif' => 'nullable',                  // can be 'on' or nullable
            'tarif_other' => 'required_with:tarif',
            'preim' => 'nullable',                  // can be 'on' or nullable
            'premiya_other' => 'required_with:preim',

            'application_form_file' => 'nullable|file',
            'contract_file' => 'nullable|file',
            'policy_file' => 'nullable|file',
        ]);

        $all_p = AllProduct::query()->findOrFail($id);
        $ph = PolicyHolder::query()->findOrFail($all_p->policy_holder_id);
        $pb = PolicyBeneficiaries::query()->findOrFail($all_p->policy_beneficiaries_id);

        if ($request->hasFile('application_form_file')) {
            if ($all_p->application_form_file){
                Storage::disk('public')->delete($all_p->application_form_file);
            }

            $file = $request->file('application_form_file')->store('/img/PolicyHolder', 'public');

            $request->application_form_file = $file;
        }
        if ($request->hasFile('contract_file')) {
            if ($all_p->contract_file){
                Storage::disk('public')->delete($all_p->contract_file);
            }

            $file = $request->file('contract_file')->store('/img/PolicyHolder', 'public');

            $request->contract_file = $file;
        }
        if ($request->hasFile('policy_file')) {
            if ($all_p->policy_file){
                Storage::disk('public')->delete($all_p->policy_file);
            }

            $file = $request->file('policy_file')->store('/img/PolicyHolder', 'public');

            $request->policy_file = $file;
        }

        $all_p = DB::transaction(function () use ($request, $all_p, $ph, $pb) {
            $ph = PolicyHolder::updatePolicyHolders($ph->id, $request);
            $pb = PolicyBeneficiaries::updatePolicyBeneficiaries($pb->id, $request);

            $all_p->update([
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

            // 1. был "транш" стал "единоврем" -> удаляем новые обьекты
            if ($all_p->has('allProductTermTransh') && $request->input('payment_term') == 1) {
                $all_p->allProductTermTransh()->delete();
            // 2. был "транш" стал "транш" -> добавляем обьекты или удаляем существующие и изменям существующие
            } else if ($all_p->has('allProductTermTransh') && $request->input('payment_term') == 'transh') {
                $exclude = [];

                foreach ($request->input('payment_sum') as $key => $value) {
                    $transh = AllProductsTermsTransh::query()->updateOrCreate([
                        'payment_sum' => $request->input('payment_sum')[$key],
                        'payment_from' => $request->input('payment_from')[$key],
                        'all_products_id' => $all_p->id
                    ], [
                        'payment_sum' => $request->input('payment_sum')[$key],
                        'payment_from' => $request->input('payment_from')[$key],
                        'all_products_id' => $all_p->id
                    ]);

                    $exclude[] = $transh->id;
                }

                $all_p->allProductTermTransh()->whereNotIn('id', $exclude)->delete();
            // 3. был "единоврем" стал "транш" -> добавляем просто новые обьекты
            } else if ($request->input('payment_term') == 'transh') {
                foreach ($request->input('payment_sum') as $key => $value) {
                    AllProductsTermsTransh::query()->create([
                        'payment_sum' => $request->input('payment_sum')[$key],
                        'payment_from' => $request->input('payment_from')[$key],
                        'all_products_id' => $all_p->id,
                    ]);
                }
            }

            foreach ($request->input('polis_name_id') as $key => $item) {
                AllProductInformation::query()->updateOrCreate([
                    'policy_id' => $request->input('polis_series_id')[$key],
                    'all_products_id' => $all_p->id,
                ], [
                    'data_vidachi' => $request->input('data_vidachi')[$key],
                    'period_deystviya_ot' => $request->input('period_deystviya_ot')[$key],
                    'period_deystviya_do' => $request->input('period_deystviya_do')[$key],
                    'otvet_litso' => $request->input('otvet_litso')[$key],
                    'kolichestvo' => $request->input('kolichestvo')[$key],
                    'strah_stoimost' => $request->input('strah_stoimost')[$key],
                    'strah_summa' => $request->input('strah_summa')[$key],
                    'strah_premiya' => $request->input('strah_premiya')[$key],
                    'all_products_id' => $all_p->id,
                ]);
            }

            return $all_p;
        });

        return back()->withInput()->with([sprintf('Данные успешно обновлены')]);
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
