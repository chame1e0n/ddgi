<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtvetstvennostPodryadchikRequest;
use App\Models\Dogovor;
use App\Models\Policy;
use App\Models\PolicyHolder;
use App\Models\Product\OtvetstvennostPodryadchik;
use App\Models\Product\OtvetstvennostPodryadchikStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OtvetstvennostPodryadchikController extends Controller
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
        return view('products.otvetstvennost.podryadchik.create', compact('banks', 'agents', 'policySeries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(OtvetstvennostPodryadchikRequest $request)
    {
        $policy = Policy::where('policy_series_id', $request->serial_number_policy)->where('status', '<>', 'in_use')->first();

        if (empty($policy)) {
            $policySeries = PolicySeries::find($request->serial_number_policy);

            return back()->withInput()->withErrors([
                sprintf('В базе отсутсвует полюс данной серии: %s', $policySeries->code)
            ]);
        }
        $newPolicyHolders = PolicyHolder::createPolicyHolders($request);
        if (!$newPolicyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении PolicyHolders')]);
        $request->policy_holder_id = $newPolicyHolders->id;
        $newOtvetstvennostPodryadchik = OtvetstvennostPodryadchik::createOtvetstvennostPodryadchik($request);
        if (!$newOtvetstvennostPodryadchik)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении OtvetstvennostPodryadchik')]);

        $policy->update([
            'status' => 'in_use',
            'client_type' => $request->client_type_radio,
        ]);

        $brancId = User::find($request->litso)->branch_id;
        $uniqueNumber = new Dogovor;
        $uniqueNumber = $uniqueNumber->createUniqueNumber(
            $brancId,
            $request->insurance_premium_payment_type,
            4,
            'otvetstvennost_podryadchiks',
            $newOtvetstvennostPodryadchik->id
        );

        $newOtvetstvennostPodryadchik->update([
            'unique_number' => $uniqueNumber,
            'policy_id' => $policy->id
        ]);

        if (!empty($request->post('payment_sum')) && !empty($request->post('payment_sum'))) {
            $i = 0;
            foreach ($request->post('payment_sum') as $sum) {
                if ($sum != null && $request->post('payment_from')[$i] != null) {
                    $newStrahPremiya = OtvetstvennostPodryadchikStrahPremiya::create([
                        'prem_sum' => $sum,
                        'prem_from' => $request->post('payment_from')[$i],
                        'otvetstvennost_podryadchik_id' => $newOtvetstvennostPodryadchik->id
                    ]);
                }
                $i++;
            }
        }
        return redirect()->route('otvetstvennost-podryadchik.edit', $newOtvetstvennostPodryadchik->id)->withInput()->with([sprintf('Данные успешно добавлены')]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $podryadchik = OtvetstvennostPodryadchik::getInfoPodryadchik($id);
        $policySeries = PolicySeries::all();
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.otvetstvennost.podryadchik.show', compact('banks', 'agents', 'policySeries', 'podryadchik'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $podryadchik = OtvetstvennostPodryadchik::getInfoPodryadchik($id);
        $policySeries = PolicySeries::all();
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.otvetstvennost.podryadchik.edit', compact('banks', 'agents', 'podryadchik', 'policySeries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(OtvetstvennostPodryadchikRequest $request, $id)
    {
        $otvetstvennostPodryadchik = OtvetstvennostPodryadchik::findOrFail($id);
        $policyHolders = PolicyHolder::updatePolicyHolders($otvetstvennostPodryadchik->policy_holder_id, $request);
        if (!$policyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при обновлении PolicyHolders')]);
        $otvetstvennostPodryadchik = OtvetstvennostPodryadchik::updateOtvetstvennostPodryadchik($id, $request);
        if (!$otvetstvennostPodryadchik)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении PolicyHolders')]);
        if ($otvetstvennostPodryadchik->payment_term == '1') {
            $delStrahPremiya = OtvetstvennostPodryadchikStrahPremiya::where('otvetstvennost_podryadchik_id', $otvetstvennostPodryadchik->id)->delete();
        } else {
            if (!empty($request->post('payment_sum')) && !empty($request->post('payment_sum'))) {
                foreach ($request->post('payment_sum') as $key => $sum) {
                    $newStrahPremiya = OtvetstvennostPodryadchikStrahPremiya::updateOrCreate([
                        'id' => $key,
                        'otvetstvennost_podryadchik_id' => $otvetstvennostPodryadchik->id
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
