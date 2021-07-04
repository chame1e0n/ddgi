<?php

namespace App\Http\Controllers;

use App\AllProduct;
use App\CurrencyTermsTransh;
use App\MejdCurrencyTermsTransh;
use App\Model\Beneficiary;
use App\Model\Client;
use App\Model\Contract;
use App\Model\ContractBorrowerAccident;
use App\Model\InsuredPerson;
use App\Model\Policy;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Bank;
use App\NeshchastkaBorrower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NeshchastkaBorrowerController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('neshchastka_borrower.form', [
            'beneficiary' => new Beneficiary(),
            'block' => false,
            'client' => new Client(),
            'contract' => new Contract(),
            'contract_borrower_accident' => new ContractBorrowerAccident(),
            'insured_person' => new InsuredPerson(),
            'policy' => new Policy(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return
     */
    public function store(Request $request)
    {
        $request->validate(array_merge(
            Beneficiary::$validate,
            Client::$validate,
            Contract::$validate,
            InsuredPerson::$validate,
            [
                'policy.name' => 'required',
                'policy.series' => 'required',
                'policy.date_of_issue' => 'required',
                'policy.insurance_sum' => 'required',
                'policy.franchise' => 'required',
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
                    'В базе не обнаружен полис с %s именованием и с %s серией',
                    $policy_data['name'],
                    $policy_data['series']
                )
            ]);
        }

        $beneficiary = Beneficiary::create($request['beneficiary']);
        $client = Client::create($request['client']);
        $insured_person = InsuredPerson::create($request['insured_person']);
        $contract_borrower_accident = ContractBorrowerAccident::create($request['contract_borrower_accident']);

        $contract_data = $request['contract'];
        $contract_data['beneficiary_id'] = $beneficiary->id;
        $contract_data['client_id'] = $client->id;
        $contract_data['insured_person_id'] = $insured_person->id;
        $contract_data['number'] = '@BoburZ какой номер?';
        $contract_data['status'] = 'concluded';

        $contract = Contract::create($contract_data);

        $policy_data['contract_id'] = $contract->id;

        $policy->fill($policy_data);
        $policy->save();

        $contract->contract_model()->associate($contract_borrower_accident);

        $files = [];
        if (isset($request['contract']['files'])) {
            foreach($request['contract']['files'] as $type => $file) {
                $files[] = [
                    'type' => $type,
                    'original_name' => $file->getClientOriginalName(),
                    'path' => Storage::putFile('public/contract', $file),
                ];
            }
        }

        $contract->files()->createMany($files);

        if ($request['tranches']) {
            $contract->tranches()->createMany($request['tranches']);
        }

        return redirect()->route('contracts.index')
                         ->with('success', 'Успешно произведено сохранения контракта');
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
        $borrower = AllProduct::query()->with('policyHolder', 'policyBeneficiaries', 'currencyTerms')->findOrFail($id);
        $banks = Bank::query()->get();
        return view('neshchastka_borrower.edit', compact('borrower', 'banks'));
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
        $borrower = AllProduct::query()->find($id);
        $policyHolder = PolicyHolder::query()->find($borrower->policy_holder_id);
        $policyBeneficiaries = PolicyBeneficiaries::query()->find($borrower->policy_beneficiaries_id);
        $currencyTerms = MejdCurrencyTermsTransh::query()->where('all_products_id', $borrower->id)->first();



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

        $policyBeneficiaries->update([
            'FIO' => $request->fio_beneficiary,
            'address' => $request->address_beneficiary,
            'phone_number' => $request->tel_beneficiary,
            'checking_account' => $request->beneficiary_schet,
            'inn' => $request->inn_beneficiary,
            'mfo' => $request->mfo_beneficiary,
            'okonx' => $request->okonh_beneficiary,
            'oked' => $request->oked_beneficiary,
            'bank_id' => $request->bank_beneficiary,
        ]);

        if (!empty($request->application_form_file)) {
            Storage::delete($borrower->application_form_file_path);
            $application_form_file_path = $request->application_form_file->store("documents_borrower_edit");
        } if(empty($request->application_form_file)) {
            $application_form_file_path = $borrower->application_form_file;
        }
        if (!empty($request->contract_file)) {
            Storage::delete($borrower->contract_file_path);
            $contract_file_path = $request->contract_file->store("documents_borrower_edit");
        } else {
            $contract_file_path = $borrower->contract_file;
        }
        if (!empty($request->policy_file)) {
            Storage::delete($borrower->policy_file_path);
            $policy_file_path = $request->policy_file->store("documents_borrower_edit");
        } else {
            $policy_file_path = $borrower->policy_file;
        }

        $borrower ->update([
            'policy_holder_id' => $policyHolder->id,
            'policy_beneficiaries_id' => $policyBeneficiaries->id,
            'fio_insured' => $request->fio_insured,
            'address_insured' => $request->address_insured,
            'tel_insured' => $request->tel_insured,
            'passport_series_insured' => $request->passport_series_insured,
            'passport_num_insured' => $request->passport_num_insured,
            'credit_contract' => $request->credit_contract,
            'credit_contract_to' => $request->credit_contract_to,
            'insurance_from' => $request->insurance_from,
            'insurance_to' => $request->insurance_to,
            'tariff' => $request->tarif,
            'percent_of_tariff' => $request->percent_of_tariff,
            'insurance_sum' => $request->insurance_sum,
            'insurance_bonus' => $request->insurance_bonus,
            'franchise' => $request->franchise,
            'insurance_premium_currency' => $request->insurance_premium_currency,
            'payment_term' => $request->payment_term,
            'way_of_calculation' => $request->way_of_calculation,
            'payment_sum_main' => $request->payment_sum_main,
            'payment_from_main' => $request->payment_from_main,
            'policy_series' => $request->policy_series,
            'policy_insurance_from' => $request->policy_insurance_from,
            'person' => $request->person,
            'application_form_file' => $application_form_file_path,
            'contract_file' => $contract_file_path,
            'policy_file' => $policy_file_path,
        ]);
        $currencyTerms ->update([
            'all_products_id' => $borrower->id,
            'payment_sum' => $request->get('payment_sum'),
            'payment_from' => $request->get('payment_from')
        ]);

        return "Succeed on editing!!!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrower = AllProduct::query()->findOrFail($id);

        $currencyTerms = MejdCurrencyTermsTransh::query()->where('all_products_id', $borrower->id)->get();
        $policyHolder = PolicyHolder::query()->findOrFail($borrower->policy_holder_id);
        $policyBeneficiaries = PolicyBeneficiaries::query()->findOrFail($borrower->policy_beneficiaries_id);
        $policyHolder->delete();
        $policyBeneficiaries->delete();
        foreach ($currencyTerms as $item) {
            $item->delete();
        }
        $borrower->delete();
        return "success";
    }
}
