<?php

namespace App\Http\Controllers\Product;

use App\Http\Requests\OtvetstvennostPodryadchikRequest;
use App\Models\Product\OtvetstvennostPodryadchikStrahPremiya;
use App\Models\PolicyHolder;
use App\Models\Product\OtvetstvennostPodryadchik;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OtvetstvennostPodryadchikController extends Controller
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
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.otvetstvennost.podryadchik.create', compact('banks', 'agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OtvetstvennostPodryadchikRequest $request)
    {
        $newPolicyHolders           = PolicyHolder::createPolicyHolders($request);
        if(!$newPolicyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении PolicyHolders')]);
        $request->policy_holder_id = $newPolicyHolders->id;
        $newOtvetstvennostPodryadchik = OtvetstvennostPodryadchik::createOtvetstvennostPodryadchik($request);
        if(!$newOtvetstvennostPodryadchik)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении PolicyHolders')]);
        if(!empty($request->post('payment_sum')) && !empty($request->post('payment_sum')))
            {
                $i = 0;
                foreach ($request->post('payment_sum') as $sum)
                {
                    $newStrahPremiya = OtvetstvennostPodryadchikStrahPremiya::create([
                    'prem_sum' => $sum,
                        'prem_from' => $request->post('payment_from')[$i],
                        'otvetstvennost_podryadchik_id' => $newOtvetstvennostPodryadchik->id
                    ]);
                    $i++;
                }
            }
        return back()->withInput()->with([sprintf('Данные успешно добавлены')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $podryadchik = OtvetstvennostPodryadchik::getInfoPodryadchik($id);
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.otvetstvennost.podryadchik.show', compact('banks', 'agents', 'podryadchik'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $podryadchik = OtvetstvennostPodryadchik::getInfoPodryadchik($id);

        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.otvetstvennost.podryadchik.edit', compact('banks', 'agents', 'podryadchik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OtvetstvennostPodryadchikRequest $request, $id)
    {
        $otvetstvennostPodryadchik = OtvetstvennostPodryadchik::findOrFail($id);
        $policyHolders           = PolicyHolder::updatePolicyHolders($otvetstvennostPodryadchik->policy_holder_id, $request);
        if(!$policyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при обновлении PolicyHolders')]);
        $otvetstvennostPodryadchik = OtvetstvennostPodryadchik::updateOtvetstvennostPodryadchik($id, $request);
        if(!$otvetstvennostPodryadchik)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении PolicyHolders')]);
        if(!empty($request->post('payment_sum')) && !empty($request->post('payment_sum')))
        {
            foreach ($request->post('payment_sum') as $key => $sum)
            {
                $newStrahPremiya = OtvetstvennostPodryadchikStrahPremiya::updateOrCreate([
                    'id' => $key,
                    'otvetstvennost_podryadchik_id' => $otvetstvennostPodryadchik->id
                ], [
                    'prem_sum' => $sum,
                    'prem_from' => $request->post('payment_from')[$key]
                ]);
            }
        }
        return back()->withInput()->with([sprintf('Данные успешно обновлены')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
