<?php

namespace App\Http\Controllers\Product;

use App\AllProduct;
use App\Http\Controllers\Controller;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractConstructionInstallationWork;
use App\Model\ConstructionParticipant;
use App\Model\Specification;
use App\Models\Dogovor;
use App\Models\Policy;
use App\Model\PolicyConstructionInstallationWork;
use App\Models\PolicyHolder;
use App\Models\Product\Cmp;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CmpController extends Controller
{
    /**
     * Display a list of all contracts.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return redirect()->route('contracts.index');
    }

    /**
     * Show a form to create a new contract.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $old_data = old();

        $specification = Specification::where('key', '=', 'S_IOCAAR')->get()->first();

        $contract = new Contract();
        $contract_construction_installation_work = new ContractConstructionInstallationWork();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = Contract::TYPE_INDIVIDUAL;
        }
        if (isset($old_data['construction_participants'])) {
            foreach ($old_data['construction_participants'] as $item) {
                $contract_construction_installation_work->construction_participants[] = new ConstructionParticipant();
            }
        }
$contract_construction_installation_work->location_specificity = [];
        return view('products.cmp.form', [
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'contract_construction_installation_work' => $contract_construction_installation_work,
            'policy' => new Policy(),
            'policy_construction_installation_work' => new PolicyConstructionInstallationWork(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
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
            'okonh_insurer' => 'required',
            'bank_insurer' => 'required',
            'insurance_from' => 'required',
            'insurance_to' => 'required',
            'object_info_dogov_stoy' => 'required',
            'object_stroy_mont' => 'required',
            'object_location' => 'required',
            'object_from_date' => 'required',
            'object_to_date' => 'required',
            'object_tel_povr' => 'required',
            'object_material' => 'required',
            'stroy_mont_sum' => 'required',
            'stroy_sum' => 'required',
            'obor_sum' => 'required',
            'stroy_mash_sum' => 'required',
            'rasx_sum' => 'required',
            'insurance_prem_sum' => 'required',
            'franchise_sum' => 'required',
            'insurence_currency' => 'required',
            'payment_term' => 'required',
            'polic_given_date' => 'required',
            'litso' => 'required',
        ]);

        $policy = Policy::where('policy_series_id', $request->policy_series_id)->where('status', '<>', 'in_use')->first();

        if (empty($policy)) {
            $policySeries = PolicySeries::find($request->policy_series_id);

            return back()->withInput()->withErrors([
                sprintf('В базе отсутсвует полюс данной серии: %s', $policySeries->code)
            ]);
        }

        $policyHolder = PolicyHolder::create([
            'FIO' => $request->fio_insurer,
            'address' => $request->address_insurer,
            'phone_number' => $request->tel_insurer,
            'checking_account' => $request->address_schet,
            'inn' => $request->inn_insurer,
            'mfo' => $request->mfo_insurer,
            'okonx' => $request->okonh_insurer,
            'bank_id' => $request->bank_insurer,
        ]);

        $insurence_currency_rate = null;

        if ($request->insurence_currency != 'UZS') {
            $jsonurl = 'https://cbu.uz/ru/arkhiv-kursov-valyut/json';
            $json = file_get_contents($jsonurl);
            $json = json_decode($json);

            foreach ($json as $data) {
                if ($data->Ccy == $request->insurence_currency) {
                    $insurence_currency_rate = $data->Rate;
                }
            }
        }

        $cmp = Cmp::create([
            'type' => $request->client_type_radio,
            'product_id' => (int)$request->product_id,
            'policy_holder_id' => $policyHolder->id,
            'holder_from_date' => $request->insurance_from,
            'holder_to_date' => $request->insurance_to,
            'object_info_dogov_stoy' => $request->object_info_dogov_stoy,
            'object_stroy_mont' => $request->object_stroy_mont,
            'object_location' => $request->object_location,
            'object_from_date' => $request->object_from_date,
            'object_to_date' => $request->object_to_date,
            'object_tel_povr' => $request->object_tel_povr,
            'object_material' => $request->object_material,
            'object_insurance_sum' => $request->object_insurance_sum,
            'stroy_mont_sum' => $request->stroy_mont_sum,
            'stroy_sum' => $request->stroy_sum,
            'obor_sum' => $request->obor_sum,
            'stroy_mash_sum' => $request->stroy_mash_sum,
            'rasx_sum' => $request->rasx_sum,
            'insurance_prem_sum' => $request->insurance_prem_sum,
            'franchise_sum' => $request->franchise_sum,
            'insurence_currency' => $request->insurence_currency,
            'insurence_currency_rate' => $insurence_currency_rate,
            'insurance_premium_payment_type' => $request->insurance_premium_payment_type,
            'user_id' => $request->litso,
            'polic_given_date' => $request->polic_given_date,
            'policy_id' => $policy->id,
            'policy_series_id' => $request->policy_series_id,
            'payment_term' => $request->payment_term,
        ]);

        $policy->update([
            'status' => 'in_use',
            'client_type' => $request->client_type_radio,
        ]);

        $brancId = User::find($request->litso)->branch_id;
        $uniqueNumber = new Dogovor;
        $uniqueNumber = $uniqueNumber->createUniqueNumber(
            $brancId,
            $request->insurance_premium_payment_type,
            3,
            'cmp',
            $cmp->id
        );
//
        $cmp->update([
            'unique_number' => $uniqueNumber
        ]);
//
        return redirect()->route('all_products.index')
            ->with('success', 'Успешно заполнен продукт');
    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param $id
//     * @return void
//     */
//    public function show($id)
//    {
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cmp $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $product = AllProduct::find($id);
        return view('products.cmp.edit', compact('product'));
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
        $cmp = Cmp::find($id);
        $cmp->policyHolder->update([
            'FIO' => $request->fio_insurer,
            'address' => $request->address_insurer,
            'phone_number' => $request->tel_insurer,
            'checking_account' => $request->address_schet,
            'inn' => $request->inn_insurer,
            'mfo' => $request->mfo_insurer,
            'okonx' => $request->okonh_insurer,
            'bank_id' => $request->bank_insurer,
        ]);

        $cmp->update([
            'holder_from_date' => $request->insurance_from,
            'holder_to_date' => $request->insurance_to,
            'object_info_dogov_stoy' => $request->object_info_dogov_stoy,
            'object_stroy_mont' => $request->object_stroy_mont,
            'object_location' => $request->object_location,
            'object_from_date' => $request->object_from_date,
            'object_to_date' => $request->object_to_date,
            'object_tel_povr' => $request->object_tel_povr,
            'object_material' => $request->object_material,
            'object_insurance_sum' => $request->object_insurance_sum,
            'stroy_mont_sum' => $request->stroy_mont_sum,
            'stroy_sum' => $request->stroy_sum,
            'obor_sum' => $request->obor_sum,
            'stroy_mash_sum' => $request->stroy_mash_sum,
            'rasx_sum' => $request->rasx_sum,
            'insurance_prem_sum' => $request->insurance_prem_sum,
            'franchise_sum' => $request->franchise_sum,
            'insurence_currency' => $request->insurence_currency,
            'insurance_premium_payment_type' => $request->insurance_premium_payment_type,
            'user_id' => $request->litso,
            'polic_given_date' => $request->polic_given_date,
            'policy_series_id' => $request->policy_series_id,
            'payment_term' => $request->payment_term,
        ]);

        return redirect()->back()->with('success', 'Успешно обновлен продукт CMP');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
//        $bonded = Bonded::find($id);
//        $bonded->policyInformations->delete();
//        $bonded->delete();
//
//        return redirect()->route('all_products.index')
//            ->with('success', sprintf('Дынные о продукте были успешно удалены', $bonded->unique_number));
    }
}
