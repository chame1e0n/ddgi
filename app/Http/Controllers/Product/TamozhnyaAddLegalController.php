<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\TamozhnyaAddLegalRequest;
use App\Models\PolicyHolder;
use App\Models\Product\TamozhnyaAddLegal;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Product\TamozhnyaAddLegalStrahPremiya;
use Illuminate\Http\Request;

class TamozhnyaAddLegalController extends Controller
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
        return view('products.tamozhnya.add-legal.create', compact('banks', 'agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TamozhnyaAddLegalRequest $request)
    {
//        dd($request->all());
        $newPolicyHolders = PolicyHolder::createPolicyHolders($request);
        if (!$newPolicyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении PolicyHolders')]);
        $request->policy_holder_id = $newPolicyHolders->id;
        if ($request->hasFile('anketa_img')) {
            $image = $request->file('anketa_img')->store('/img/PolicyHolder', 'public');
            $request->anketa_img = $image;
        }
        if ($request->hasFile('dogovor_img')) {
            $image = $request->file('dogovor_img')->store('/img/PolicyHolder', 'public');
            $request->dogovor_img = $image;
        }
        if ($request->hasFile('polis_img')) {
            $image = $request->file('polis_img')->store('/img/PolicyHolder', 'public');
            $request->polis_img = $image;
        }
        $newTamozhnyaAddLegal = TamozhnyaAddLegal::createTamozhnyaAddLegal($request);
        if (!$newTamozhnyaAddLegal)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении TamozhnyaAddLegal')]);


        if (!empty($request->post('payment_sum')) && !empty($request->post('payment_sum'))) {
            $i = 0;
            foreach ($request->post('payment_sum') as $sum) {
                if ($sum != null && $request->post('payment_from')[$i] != null) {
                    $newStrahPremiya = TamozhnyaAddLegalStrahPremiya::create([
                        'prem_sum' => $sum,
                        'prem_from' => $request->post('payment_from')[$i],
                        'tamozhnya_add_legal_id' => $newTamozhnyaAddLegal->id
                    ]);
                }
                $i++;
            }
        }
        return redirect()->route('tamozhnya-add-legal.edit', $newTamozhnyaAddLegal->id)->with([sprintf('Данные успешно добавлены')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tamozhnya = TamozhnyaAddLegal::getInfoTamozhnya($id);
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.tamozhnya.add-legal.show', compact('banks', 'agents', 'tamozhnya'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tamozhnya = TamozhnyaAddLegal::getInfoTamozhnya($id);
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.tamozhnya.add-legal.edit', compact('banks', 'agents', 'tamozhnya'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TamozhnyaAddLegalRequest $request, $id)
    {
        $tamozhnyaAddLegal = TamozhnyaAddLegal::findOrFail($id);
        $policyHolders = PolicyHolder::updatePolicyHolders($tamozhnyaAddLegal->policy_holder_id, $request);
        if (!$policyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при обновлении PolicyHolders')]);
        $request->policy_holder_id = $policyHolders->id;
        if ($request->hasFile('anketa_img')) {
            $image = $request->file('anketa_img')->store('/img/PolicyHolder', 'public');
            $request->anketa_img = $image;
        } else
            $request->anketa_img = $tamozhnyaAddLegal->anketa_img;

        if ($request->hasFile('dogovor_img')) {
            $image = $request->file('dogovor_img')->store('/img/PolicyHolder', 'public');
            $request->dogovor_img = $image;
        } else
            $request->dogovor_img = $tamozhnyaAddLegal->dogovor_img;

        if ($request->hasFile('polis_img')) {
            $image = $request->file('polis_img')->store('/img/PolicyHolder', 'public');
            $request->polis_img = $image;
        } else
            $request->polis_img = $tamozhnyaAddLegal->polis_img;

        $tamozhnyaAddLegal = TamozhnyaAddLegal::updateTamozhnyaAddLegal($id, $request);
        if (!$tamozhnyaAddLegal)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $tamozhnyaAddLegal')]);
        if($tamozhnyaAddLegal->payment_term == '1')
        {
            $delStrahPremiya = TamozhnyaAddLegalStrahPremiya::where('tamozhnya_add_legal_id', $tamozhnyaAddLegal->id)->delete();
        }
        else
        {
        if (!empty($request->post('payment_sum')) && !empty($request->post('payment_sum'))) {
            foreach ($request->post('payment_sum') as $key => $sum) {
                $newStrahPremiya = TamozhnyaAddLegalStrahPremiya::updateOrCreate([
                    'id' => $key,
                    'tamozhnya_add_legal_id' => $tamozhnyaAddLegal->id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
