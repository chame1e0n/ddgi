<?php

namespace App\Http\Controllers;

use App\AllProduct;
use App\AllProductInformation;
use App\AllProductsTermsTransh;
use App\MejdCurrencyTermsTransh;
use App\Model\Client;
use App\Model\Contract;
use App\Model\Employee;
use App\Model\InsuredPerson;
use App\Model\Policy;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MejdController extends Controller
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

        $specification = Specification::where('key', '=', 'S_IOPIIRTAA')->get()->first();

        $contract = new Contract();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = request('type', Contract::TYPE_INDIVIDUAL);
        }
        if (isset($old_data['tranches'])) {
            foreach ($old_data['tranches'] as $key => $item) {
                $contract->tranches[$key] = new Tranche();
            }
        }

        return view('products.neshchastka.form', [
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
            'insured_person' => new InsuredPerson(),
            'policy' => new Policy(),
        ]);
    }

    /**
     * Store a new contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate(array_merge(
            Client::$validate,
            Contract::$validate,
            InsuredPerson::$validate,
            [
                'policy.name' => 'required',
                'policy.series' => 'required',
                'policy.date_of_issue' => 'required',
                'policy.polis_from_date' => 'required',
                'policy.polis_to_date' => 'required',
                'policy.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policy.franchise' => ['required', 'numeric', 'min:0'],

                'tranches.*.sum' => ['required', 'numeric', 'min:0'],
                'tranches.*.from' => 'required',
            ]
        ));

        $policy_data = $request['policy'];

        $policy = Policy::where('name', '=', $policy_data['name'])
            ->where('series', '=', $policy_data['series'])
            ->get()
            ->first();

        if (!$policy) {
            return back()->withErrors([
                sprintf(
                    '?? ???????? ???? ?????????????????? ?????????? ?? %s ?????????????????????? ?? ?? %s ????????????',
                    $policy_data['name'],
                    $policy_data['series']
                )
            ]);
        }

        $client = Client::create($request['client']);
        $insured_person = InsuredPerson::create($request['insured_person']);

        $contract_data = $request['contract'];
        $contract_data['client_id'] = $client->id;
        $contract_data['insured_person_id'] = $insured_person->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';

        $contract = Contract::create($contract_data);

        $policy_data['contract_id'] = $contract->id;

        $policy->fill($policy_data);
        $policy->save();

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        $files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file) {
                $files[] = [
                    'type' => $type,
                    'original_name' => $file->getClientOriginalName(),
                    'path' => Storage::putFile('public/contract', $file),
                ];
            }
        }

        $contract->files()->createMany($files);

        $contract->generateNumber();

        return redirect()->route('contracts.index')
                         ->with('success', '?????????????? ?????????????????????? ???????????????????? ??????????????????');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $mejd
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $mejd)
    {
        $contract = $mejd;

        return view('products.neshchastka.form', [
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
            'insured_person' => $contract->insured_person,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $mejd
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $mejd)
    {
        $contract = $mejd;

        return view('products.neshchastka.form', [
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
            'insured_person' => $contract->insured_person,
            'policy' => $contract->policies->first(),
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $mejd
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $mejd)
    {
        $request->validate(array_merge(
            Client::$validate,
            Contract::$validate,
            InsuredPerson::$validate,
            [
                'policy.name' => 'required',
                'policy.series' => 'required',
                'policy.date_of_issue' => 'required',
                'policy.polis_from_date' => 'required',
                'policy.polis_to_date' => 'required',
                'policy.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policy.franchise' => ['required', 'numeric', 'min:0'],

                'tranches.*.sum' => ['required', 'numeric', 'min:0'],
                'tranches.*.from' => 'required',
            ]
        ));

        $contract = $mejd;

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $insured_person = $contract->insured_person;
        $insured_person->fill($request['insured_person']);
        $insured_person->save();

        $contract->fill($request['contract']);
        $contract->save();

        $policy = $contract->policies->first();
        $policy->fill($request['policy']);
        $policy->save();

        if ($request['tranches']) {
            $tranche_ids = [];
            foreach($request['tranches'] as $tranche_data) {
                $tranche = Tranche::where('contract_id', '=', $contract->id)
                                  ->where('from', '=', $tranche_data['from'])
                                  ->get()
                                  ->first();

                if ($tranche) {
                    if ($tranche->sum != $tranche_data['sum']) {
                        $tranche->sum = $tranche_data['sum'];
                        $tranche->save();
                    }
                } else {
                    $tranche = $contract->tranches()->create($tranche_data);
                }

                $tranche_ids[] = $tranche->id;
            }

            Tranche::where('contract_id', '=', $contract->id)
                   ->whereNotIn('id', $tranche_ids)
                   ->delete();
        }

        $files = [];
        if (isset($request['files'])) {
            foreach($request['files'] as $type => $file) {
                if ($old_file = $contract->getFile($type)) {
                    $old_file->delete();
                }

                $files[] = [
                    'type' => $type,
                    'original_name' => $file->getClientOriginalName(),
                    'path' => Storage::putFile('public/contract', $file),
                ];
            }
        }

        $contract->files()->createMany($files);

        return redirect()->route('contracts.index')
                         ->with('success', '?????????????? ?????????????????????? ?????????????????? ??????????????????');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $mejd
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $mejd)
    {
        $contract = $mejd;

        if ($policy = $contract->policies->first()) {
            $policy->delete();
        }
        $contract->delete();

        return redirect()->route('contracts.index')
                         ->with('success', sprintf('???????????? ?? ?????????????????? \'%s\' ???????? ?????????????? ??????????????', $contract->number));
    }
}
