<?php

namespace App\Http\Controllers\Product;

use App\Helpers\Convertio\Convertio;
use App\Http\Requests\CovidRequest;
use App\Model\Beneficiary;
use App\Model\Client;
use App\Model\Contract;
use App\Model\Employee;
use App\Model\Policy;
use App\Model\PolicyCovid;
use App\Model\Specification;
use App\Model\Tranche;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Product\Covid;
use App\Models\Product\CovidPolicyInformation;
use App\Models\Product\CovidStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\TemplateProcessor;

class CovidController extends Controller
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

        $specification = Specification::where('key', '=', 'S_CCI')->get()->first();

        $contract = new Contract();

        if ($specification) {
            $contract->specification_id = $specification->id;
            $contract->type = request('type', Contract::TYPE_INDIVIDUAL);
        }
        if (isset($old_data['policies'])) {
            foreach ($old_data['policies'] as $item) {
                $policy = new Policy();
                $policy->policy_model = new PolicyCovid();

                $contract->policies[] = $policy;
            }
        }
        if (isset($old_data['tranches'])) {
            foreach ($old_data['tranches'] as $key => $item) {
                $contract->tranches[$key] = new Tranche();
            }
        }

        return view('products.covid.fiz-litso.form', [
            'beneficiary' => new Beneficiary(),
            'block' => false,
            'client' => new Client(),
            'contract' => $contract,
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
            Beneficiary::$validate,
            Client::$validate,
            Contract::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policies.*.franchise' => ['required', 'numeric', 'min:0'],

                'policies.*.policy_covid.name' => 'required',
                'policies.*.policy_covid.surname' => 'required',
                'policies.*.policy_covid.middlename' => 'required',
                'policies.*.policy_covid.passport' => 'required',
                'policies.*.policy_covid.passport_issue_date' => 'required',
                'policies.*.policy_covid.passport_issue_place' => 'required',
                'policies.*.policy_covid.insurance_value' => ['required', 'numeric', 'min:0'],

                'tranches.*.sum' => ['required', 'numeric', 'min:0'],
                'tranches.*.from' => 'required',
            ]
        ));

        $policies_data = $request['policies'];

        $query = Policy::query();
        if ($policies_data) {
            foreach($policies_data as $policies_item) {
                $query->orWhere(function (Builder $sub_query) use ($policies_item) {
                    $sub_query->where('name', '=', $policies_item['name'])
                              ->where('series', '=', $policies_item['series']);
                });
            }
        }

        if (empty($policies_data) || $query->count() == 0) {
            return back()->withErrors('В базе не обнаружен ни один полис с указанными именованием и серией');
        }

        $beneficiary = Beneficiary::create($request['beneficiary']);
        $client = Client::create($request['client']);

        $contract_data = $request['contract'];
        $contract_data['beneficiary_id'] = $beneficiary->id;
        $contract_data['client_id'] = $client->id;
        $contract_data['number'] = '';
        $contract_data['status'] = 'concluded';

        $contract = Contract::create($contract_data);

        foreach($policies_data as $policy_data) {
            $policy = Policy::where('name', '=', $policy_data['name'])
                            ->where('series', '=', $policy_data['series'])
                            ->get()
                            ->first();

            if ($policy) {
                $policy_covid = PolicyCovid::create($policy_data['policy_covid']);

                unset($policy_data['policy_covid']);

                $policy_data['contract_id'] = $contract->id;
                $policy_data['model_type'] = PolicyCovid::class;
                $policy_data['model_id'] = $policy_covid->id;

                $policy->fill($policy_data);
                $policy->save();
            }
        }

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
                         ->with('success', 'Успешно произведено сохранение контракта');
    }

    /**
     * Display an existing contract.
     *
     * @param  \App\Model\Contract $covid_fiz
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $covid_fiz)
    {
        $contract = $covid_fiz;

        return view('products.covid.fiz-litso.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => true,
            'client' => $contract->client,
            'contract' => $contract,
        ]);
    }

    /**
     * Show a form to edit existing contract.
     *
     * @param  \App\Model\Contract $covid_fiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $covid_fiz)
    {
        $contract = $covid_fiz;

        return view('products.covid.fiz-litso.form', [
            'beneficiary' => $contract->beneficiary,
            'block' => false,
            'client' => $contract->client,
            'contract' => $contract,
        ]);
    }

    /**
     * Update an existing contract.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Contract      $covid_fiz
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Contract $covid_fiz)
    {
        $request->validate(array_merge(
            Beneficiary::$validate,
            Client::$validate,
            Contract::$validate,
            [
                'policies.*.name' => 'required',
                'policies.*.series' => 'required',
                'policies.*.date_of_issue' => 'required',
                'policies.*.insurance_sum' => ['required', 'numeric', 'min:0'],
                'policies.*.franchise' => ['required', 'numeric', 'min:0'],

                'policies.*.policy_covid.name' => 'required',
                'policies.*.policy_covid.surname' => 'required',
                'policies.*.policy_covid.middlename' => 'required',
                'policies.*.policy_covid.passport' => 'required',
                'policies.*.policy_covid.passport_issue_date' => 'required',
                'policies.*.policy_covid.passport_issue_place' => 'required',
                'policies.*.policy_covid.insurance_value' => ['required', 'numeric', 'min:0'],

                'tranches.*.sum' => ['required', 'numeric', 'min:0'],
                'tranches.*.from' => 'required',
            ]
        ));

        $contract = $covid_fiz;

        $beneficiary = $contract->beneficiary;
        $beneficiary->fill($request['beneficiary']);
        $beneficiary->save();

        $client = $contract->client;
        $client->fill($request['client']);
        $client->save();

        $contract->fill($request['contract']);
        $contract->save();

        if ($request['policies']) {
            $policies_ids = [];
            foreach($request['policies'] as $policy_data) {
                $policy = Policy::where('contract_id', '=', $contract->id)
                                ->where('name', '=', $policy_data['name'])
                                ->where('series', '=', $policy_data['series'])
                                ->get()
                                ->first();

                if ($policy) {
                    $policy_covid = $policy->policy_model;
                    $policy_covid->fill($policy_data['policy_covid']);
                    $policy_covid->save();

                    unset($policy_data['policy_covid']);

                    $policy->fill($policy_data);
                    $policy->save();
                } else {
                    $policy = Policy::where('name', '=', $policy_data['name'])
                                    ->where('series', '=', $policy_data['series'])
                                    ->get()
                                    ->first();

                    if ($policy) {
                        $policy_covid = PolicyCovid::create($policy_data['policy_covid']);

                        unset($policy_data['policy_covid']);

                        $policy_data['contract_id'] = $contract->id;
                        $policy_data['model_type'] = PolicyCovid::class;
                        $policy_data['model_id'] = $policy_covid->id;

                        $policy->fill($policy_data);
                        $policy->save();
                    }
                }

                $policies_ids[] = $policy->id;
            }

            $policies = Policy::where('contract_id', '=', $contract->id)
                              ->whereNotIn('id', $policies_ids)
                              ->get();
            foreach($policies as /* @var $policy Policy */ $policy) {
                $policy->delete();
            }
        }

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
                         ->with('success', 'Успешно произведено изменение контракта');
    }

    /**
     * Destroy an existing contract.
     *
     * @param  \App\Model\Contract $neshchastka_time
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $covid_fiz)
    {
        $contract = $covid_fiz;

        if ($policies = $contract->policies) {
            foreach($policies as /* @var $policy Policy */ $policy) {
                $policy->delete();
            }
        }
        $contract->delete();

        return redirect()->route('contracts.index')
                         ->with('success', sprintf('Данные о контракте \'%s\' были успешно удалены', $contract->number));
    }

/*
    public function print()
    {
        if (isset($_GET['download']) && $_GET['download'] == 'polis'){
            $document = new TemplateProcessor(public_path('covid/polis.docx'));
            $document->setValues([
                'fio_insurer' => $page->policyHolders->FIO,
                'ins_passport' => $page->policyHolders->passport_series.' '.$page->policyHolders->passport_number,
                'ben_passport' => $page->policyBeneficiaries->seria_passport.' '.$page->policyBeneficiaries->nomer_passport,
                'ins_phone'    => $page->policyHolders->phone_number,
                'ben_phone'    => $page->policyBeneficiaries->phone_number,
                'from_dd' =>  date('d', strtotime($page->insurance_from)),
                'from_mm' =>  date('m', strtotime($page->insurance_from)),
                'from_year' =>  date('Y', strtotime($page->insurance_from)),
                'insurance_to' => date('d-m-Y', strtotime($page->insurance_to)),
                'insurance_sum' => $page->infos->sum('insurance_sum'),
                'insurance_premium' => $page->strahPremiya->sum('prem_sum'),
                'litso' => $page->agent->getFio(),
                'branch' => $page->agent->user->brnach->address,
            ]);
            $last = 0;
            foreach ($page->infos as $key => $info)
            {
                $document->setValues([
                    'person_fio'.$key => $info->person_name.' '.$info->person_surname.' '.$info->person_lastname,
                    'person_passport'.$key   => $info->series_and_number_passport,
                    'person_sum'.$key => $info->insurance_sum,
                ]);
                $last = $key;
            }
            for($i = $last; $i<5; $i++)
            {
                $document->setValues([
                    'person_fio'.$i => null,
                    'person_passport'.$i   => null,
                    'person_sum'.$i => null,
                ]);
            }
            $document->saveAs('polis.docx');
            try {
                $API = new Convertio(config('app.convertioKey'));
                $API->start('polis.docx', 'pdf')->wait()->download('polis.pdf')->delete();
                echo "<script>window.open('".config('app.url')."/polis.pdf', '_blank').print()</script>";
            }
            catch (\Exception $e)
            {
                return redirect('/polis.docx');
            }
        }
<a href="{{url()->current()}}?download=polis">Скачать Полис</a>
    }
*/
}
