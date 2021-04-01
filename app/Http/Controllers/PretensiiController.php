<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\Pretensii;
use App\Models\PretensiiOverview;
use App\Models\Product\Kasko;
use App\Models\Region;
use App\User;
use Illuminate\Http\Request;

class PretensiiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pretensiis = [];

        if (isset($request->unique_number) && !empty($request->unique_number)) {
            $policies = $this->search($request->unique_number, $request->from_date);

            if (empty($policies)) {
                return view('pretensii.index', compact('pretensiis'))->withErrors(['Нет договора с такими параметрами']);
            }

            $pretensiis = Pretensii::whereIn('policy_id', $policies)->paginate(5);

            return view('pretensii.index', compact('pretensiis'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }

        return view('pretensii.index', compact('pretensiis'));
    }

    public function search($uniqueNumber, $fromDate)
    {
        $dogovor = Kasko::where('unique_number', $uniqueNumber)
            ->where('from_date', $fromDate)
            ->first();

        if (!empty($dogovor)) {
            return $dogovor->policyInformations->pluck('policy_id')->toArray();
        }

        return [];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $policies = $this->getAvailablePolicies();
        /*TODO :: in the future if we add search functionality
         *
         * $policy = Policy::find($id);

        if (!isset($policy) && !empty($policy)) {
            return redirect()->back()->withErrors(['policy_id.required', 'Не правильный полис']);;
        }*/

        return view('pretensii.create', compact('policies'));
    }

    public function getAvailablePolicies()
    {
        $alreadyUsedPolicyIds = Pretensii::all()->pluck('policy_id')->toArray();
        //Todo :: add 'used' policy only here
        return Policy::whereNotIn('id', $alreadyUsedPolicyIds)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'case_number' => 'required',
            'insurer' => 'required',
            'insurance_contract' => 'required',
            'insurence_period' => 'required',
            'insured_sum' => 'required',
            'payable_by_agreement' => 'required',
            'actually_paid' => 'required',
            'last_payment_date' => 'required',
            'deductible_amount' => 'required',
            'franchise_percentage' => 'required',
            'reinsurance' => 'required',
            'date_applications' => 'required',
            'date_of_the_insured_event' => 'required',
            'event_description' => 'required',
            'object_description' => 'required',
            'claimed_loss_sum' => 'required',
            'refund_paid_sum' => 'required',
            'currency_exchange_rate' => 'required',
            'total_amount_in_sums' => 'required',
            'date_of_payment_compensation' => 'required',
            'final_settlement_date' => 'required',
        ]);
        Pretensii::create($request->all());

        return redirect()->route('pretensii.index')
            ->with('success', 'Успешно добавлена новая притензия');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pretensii $pretensii
     * @return \Illuminate\Http\Response
     */
    public function show(Pretensii $pretensii)
    {
        return redirect()->route('pretensii.edit', ['pretensii' => $pretensii->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pretensii $pretensii
     * @return \Illuminate\Http\Response
     */
    public function edit(Pretensii $pretensii)
    {
        $policies = $this->getAvailablePolicies();

        return view('pretensii.edit', compact('pretensii', 'policies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Pretensii $pretensii
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pretensii $pretensii)
    {
        $pretensii->update($request->all());

        return redirect()->route('pretensii.index')
            ->with('success', sprintf('Дынные о претензии с номером документа\'%s\' были успешно обновлены', $request->input('case_number')));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pretensii $pretensii
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pretensii $pretensii)
    {
        $pretensii->delete();

        return redirect()->route('pretensii.index')
            ->with('success', sprintf('Дынные о претензии с номером документа \'%s\' были успешно удалены', $pretensii->case_number));
    }
}
