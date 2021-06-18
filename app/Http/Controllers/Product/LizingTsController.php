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

class LizingTsController extends Controller
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

        return view('products.lizing_ts.create', compact('beneficiary', 'client', 'contract'));
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
            'okonx_beneficiary' => 'required|integer',
            'seria_passport' => 'required|string|max:255',
            'nomer_passport' => 'required|integer',

            // Договор лизинга
            'dogovor_lizing_number' => 'required|integer',
            'dogovor_period_from' => 'required|date',
            'dogovor_period_to' => 'required|date',

            // Период страхования...
            'period_insurance_from' => 'required|date',
            'period_insurance_to' => 'required|date',
            'geo_zone' => 'required|string',

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

            // Сведения о страховом полисе
            'polis_name' => 'required|string|max:255',
            'policy_id' => 'required|integer',
            'data_vidachi' => 'required|date',
            'otvet_litso' => 'required|integer',

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
                'dogovor_lizing_number' => $request->input('dogovor_lizing_number'),
                'dogovor_period_from' => $request->input('dogovor_period_from'),
                'dogovor_period_to' => $request->input('dogovor_period_to'),

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
                        'all_products_id' => $allP->id
                    ]);
                }
            }

            AllProductInformation::query()->create([
                'policy_id' => $request->input('policy_id'),
                'data_vidachi' => $request->input('data_vidachi'),
                'otvet_litso' => $request->input('otvet_litso'),
                'all_products_id' => $allP->id
            ]);

            return $allP;
        });

        return redirect()->route('lizing_ts.edit', $allProduct->id)->withInput()->with([sprintf('Данные успешно добавлены')]);
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
        return view('products.lizing_ts.edit', compact('product'));
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
            'okonx_beneficiary' => 'required|integer',
            'seria_passport' => 'required|string|max:255',
            'nomer_passport' => 'required|integer',

            // Договор лизинга
            'dogovor_lizing_number' => 'required|integer',
            'dogovor_period_from' => 'required|date',
            'dogovor_period_to' => 'required|date',

            // Период страхования...
            'period_insurance_from' => 'required|date',
            'period_insurance_to' => 'required|date',
            'geo_zone' => 'required|string',

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

            // Сведения о страховом полисе
            'polis_name' => 'required|string|max:255',
            'policy_id' => 'required|integer',
            'data_vidachi' => 'required|date',
            'otvet_litso' => 'required|integer',

            'application_form_file' => 'nullable|file',
            'contract_file' => 'nullable|file',
            'policy_file' => 'nullable|file',
        ]);

        $allP = AllProduct::query()->findOrFail($id);
        $ph = PolicyHolder::query()->findOrFail($allP->policy_holder_id);
        $pb = PolicyBeneficiaries::query()->findOrFail($allP->policy_beneficiaries_id);

        if ($request->hasFile('application_form_file')) {
            if ($allP->application_form_file) {
                Storage::disk('public')->delete($allP->application_form_file);
            }
            $file = $request->file('application_form_file')->store('/img/PolicyHolder', 'public');
            $request->application_form_file = $file;
        }
        if ($request->hasFile('contract_file')) {
            if ($allP->contract_file) {
                Storage::disk('public')->delete($allP->contract_file);
            }
            $file = $request->file('contract_file')->store('/img/PolicyHolder', 'public');
            $request->contract_file = $file;
        }
        if ($request->hasFile('policy_file')) {
            if ($allP->policy_file) {
                Storage::disk('public')->delete($allP->policy_file);
            }
            $file = $request->file('policy_file')->store('/img/PolicyHolder', 'public');
            $request->policy_file = $file;
        }

        $allP = DB::transaction(function () use ($request, $allP, $ph, $pb) {
            $ph = PolicyHolder::updatePolicyHolders($ph->id, $request);
            $pb = PolicyBeneficiaries::updatePolicyBeneficiaries($pb->id, $request);

            $allP->update([
                'dogovor_lizing_number' => $request->input('dogovor_lizing_number'),
                'dogovor_period_from' => $request->input('dogovor_period_from'),
                'dogovor_period_to' => $request->input('dogovor_period_to'),

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
            if ($allP->has('allProductTermTransh') && $request->input('payment_term') == 1) {
                $allP->allProductTermTransh()->delete();
            } // 2. был "транш" стал "транш" -> добавляем обьекты или удаляем существующие и изменям существующие
            else if ($allP->has('allProductTermTransh') && $request->input('payment_term') == 'transh') {
                $exclude = [];
                foreach ($request->input('payment_sum') as $key => $value) {
                    $transh = AllProductsTermsTransh::query()->updateOrCreate([
                        'payment_sum' => $request->input('payment_sum')[$key],
                        'payment_from' => $request->input('payment_from')[$key],
                        'all_products_id' => $allP->id
                    ], [
                        'payment_sum' => $request->input('payment_sum')[$key],
                        'payment_from' => $request->input('payment_from')[$key],
                        'all_products_id' => $allP->id
                    ]);

                    $exclude[] = $transh->id;
                }

                $allP->allProductTermTransh()->whereNotIn('id', $exclude)->delete();
            } // 3. был "единоврем" стал "транш" -> добавляем просто новые обьекты
            else if ($request->input('payment_term') == 'transh') {
                foreach ($request->input('payment_sum') as $key => $value) {
                    AllProductsTermsTransh::query()->create([
                        'payment_sum' => $request->input('payment_sum')[$key],
                        'payment_from' => $request->input('payment_from')[$key],
                        'all_products_id' => $allP->id
                    ]);
                }
            }


            // all product info
            AllProductInformation::query()
                ->where([
                    'all_products_id' => $allP->id
                ])
                ->update([
                    'policy_id' => $request->input('policy_id'),
                    'data_vidachi' => $request->input('data_vidachi'),
                    'otvet_litso' => $request->input('otvet_litso'),
                ]);

            return $allP;
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
