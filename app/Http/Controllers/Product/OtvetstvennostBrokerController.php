<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtvetstvennostBrokerRequest;
use App\Models\Policy;
use App\Models\PolicyHolder;
use App\Models\Product\OtvetstvennostBroker;
use App\Models\Product\OtvetstvennostBrokerStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OtvetstvennostBrokerController extends Controller
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
        $policySeries = PolicySeries::all();
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.otvetstvennost.broker.create', compact('banks', 'agents', 'policySeries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(OtvetstvennostBrokerRequest $request)
    {
        $policy = Policy::where('policy_series_id', $request->policy_series_id)->where('status', '<>', 'in_use')->first();

        if (empty($policy)) {
            $policySeries = PolicySeries::find($request->policy_series_id);

            return back()->withInput()->withErrors([
                sprintf('В базе отсутсвует полюс данной серии: %s', $policySeries->code)
            ]);
        }
        $newPolicyHolders = PolicyHolder::createPolicyHolders($request);
        if (!$newPolicyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении PolicyHolders')]);
        $request->policy_holder_id = $newPolicyHolders->id;
        $newOtvetstvennostBroker = OtvetstvennostBroker::createOtvetstvennostBroker($request);
        if (!$newOtvetstvennostBroker)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении OtvetstvennostBroker')]);
        if (!empty($request->post('payment_sum')) && !empty($request->post('payment_sum'))) {
            $i = 0;
            foreach ($request->post('payment_sum') as $sum) {
                if ($sum != null && $request->post('payment_from')[$i] != null) {
                    $newStrahPremiya = OtvetstvennostBrokerStrahPremiya::create([
                        'prem_sum' => $sum,
                        'prem_from' => $request->post('payment_from')[$i],
                        'otvetstvennost_broker_id' => $newOtvetstvennostBroker->id
                    ]);
                }
                $i++;
            }
        }
        return redirect()->route('otvetstvennost-broker.edit', $newOtvetstvennostBroker->id)->withInput()->with([sprintf('Данные успешно добавлены')]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $broker = OtvetstvennostBroker::getInfoPodryadchik($id);
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.otvetstvennost.broker.show', compact('banks', 'agents', 'broker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $broker = OtvetstvennostBroker::getInfoPodryadchik($id);
        $policySeries = PolicySeries::all();
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.otvetstvennost.broker.edit', compact('banks', 'agents', 'broker', 'policySeries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(OtvetstvennostBrokerRequest $request, $id)
    {
        $OtvetstvennostBroker = OtvetstvennostBroker::findOrFail($id);
        $policyHolders = PolicyHolder::updatePolicyHolders($OtvetstvennostBroker->policy_holder_id, $request);
        if (!$policyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при обновлении PolicyHolders')]);
        $OtvetstvennostBroker = OtvetstvennostBroker::updateOtvetstvennostBroker($id, $request);
        if (!$OtvetstvennostBroker)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении PolicyHolders')]);
        if ($OtvetstvennostBroker->payment_term == '1') {
            $delStrahPremiya = OtvetstvennostBrokerStrahPremiya::where('otvetstvennost_broker_id', $OtvetstvennostBroker->id)->delete();
        } else {
            if (!empty($request->post('payment_sum')) && !empty($request->post('payment_sum'))) {
                foreach ($request->post('payment_sum') as $key => $sum) {
                    $newStrahPremiya = OtvetstvennostBrokerStrahPremiya::updateOrCreate([
                        'id' => $key,
                        'otvetstvennost_broker_id' => $OtvetstvennostBroker->id
                    ], [
                        'prem_sum' => $sum,
                        'prem_from' => $request->post('payment_from')[$key]
                    ]);
                }
            }
        }

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
