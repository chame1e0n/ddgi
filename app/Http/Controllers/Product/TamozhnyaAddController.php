<?php

namespace App\Http\Controllers\Product;
use App\Http\Controllers\Controller;

use App\Http\Requests\TamozhnyaAddRequest;
use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use App\Models\Product\TamozhnyaAdd;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\TamozhnyaAddStrahPremiya;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class TamozhnyaAddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        return view('products.tamozhnya.add.create', compact('banks', 'agents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TamozhnyaAddRequest $request)
    {
        $newPolicyHolders           = PolicyHolder::createPolicyHolders($request);
        if(!$newPolicyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении PolicyHolders')]);
        $newPolicyBeneficiaries     = PolicyBeneficiaries::createPolicyBeneficiaries($request);
        if(!$newPolicyBeneficiaries)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $newPolicyBeneficiaries')]);
        $request->policy_holder_id = $newPolicyHolders->id;
        $request->policy_beneficiary_id = $newPolicyBeneficiaries->id;
        if ($request->hasFile('anketa_img')) {
            $image          = $request->file('anketa_img')->store('/img/PolicyHolder', 'public');
            $request->anketa_img   = $image;
        }
        if ($request->hasFile('dogovor_img')) {
            $image          = $request->file('dogovor_img')->store('/img/PolicyHolder', 'public');
            $request->dogovor_img   = $image;
        }
        if ($request->hasFile('polis_img')) {
            $image          = $request->file('polis_img')->store('/img/PolicyHolder', 'public');
            $request->polis_img   = $image;
        }
        $newTamozhnyaAdd = TamozhnyaAdd::createTamozhnyaAdd($request);
        if(!$newTamozhnyaAdd)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $newTamozhnyaAdd')]);
        if(!empty($request->post('payment_sum')) && !empty($request->post('payment_sum')))
        {
            $i = 0;
            foreach ($request->post('payment_sum') as $sum)
            {
                if($sum != null && $request->post('payment_from')[$i] != null)
                {
                    $newStrahPremiya = \App\Models\Product\TamozhnyaAddStrahPremiya::create([
                        'prem_sum' => $sum,
                        'prem_from' => $request->post('payment_from')[$i],
                        'tamozhnya_add_id' => $newTamozhnyaAdd->id
                    ]);
                }
                $i++;
            }
        }
        return redirect()->route('tamozhnya-add.edit', $newTamozhnyaAdd->id)->withInput()->with([sprintf('Данные успешно добавлены')]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tamozhnya = TamozhnyaAdd::getInfoTamozhnya($id);
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.tamozhnya.add.edit', compact('banks', 'agents', 'tamozhnya'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tamozhnya = TamozhnyaAdd::getInfoTamozhnya($id);
        $banks = Bank::all();
        $agents = Agent::all();
        if (isset($_GET['download']) && $_GET['download'] == 'dogovor'){
            $document = new TemplateProcessor(public_path('tamozhnya_documents/dogovor.docx'));
            $document->setValues([
                'litso' => $tamozhnya->agent->getFIO(),
                'fio_insurer' => $tamozhnya->policyHolders->FIO,
                'strahovaya_sum' =>  $tamozhnya->strahovaya_sum,
                'strahovaya_purpose' => $tamozhnya->strahovaya_purpose,
                'address' => $tamozhnya->agent->user->brnach->address,
                'tel'     => $tamozhnya->agent->user->brnach->phone_numner,
                'insurer_address' => $tamozhnya->policyHolders->address,
                'insurer_tel'     => $tamozhnya->policyHolders->phone_number,
                'director'     => $tamozhnya->agent->user->director->getFIO(),
                'insurer_schet'     => $tamozhnya->policyHolders->checking_account,
                'insurer_mfo'     => $tamozhnya->policyHolders->inn,
                'insurer_inn'     => $tamozhnya->policyHolders->mfo,
                'insurer_oked'     => $tamozhnya->policyHolders->oked,
                'filial'           => $tamozhnya->agent->user->brnach->name,
            ]);
            $document->saveAs('dogovor.docx');
            return response()->download('dogovor.docx');
        }
        if (isset($_GET['download']) && $_GET['download'] == 'za'){
            $document = new TemplateProcessor(public_path('tamozhnya_documents/anketa.docx'));
            $document->setValues([
                'description' => $tamozhnya->description,
                'prichina_pretenzii' => $tamozhnya->prichina_pretenzii,
                'warehouse_volume'   => $tamozhnya->warehouse_volume,
                'product_volume' =>$tamozhnya->product_volume,
                'insurer_tel'     => $tamozhnya->policyHolders->phone_number,
                'insurer_schet'     => $tamozhnya->policyHolders->checking_account,
                'insurer_mfo'     => $tamozhnya->policyHolders->inn,
                'insurer_inn'     => $tamozhnya->policyHolders->mfo,
                'litso' => $tamozhnya->agent->getFio(),
                'fio_insurer' => $tamozhnya->policyHolders->FIO,
            ]);
            $document->saveAs('za.docx');
            return response()->url('za.docx');
        }
        if (isset($_GET['download']) && $_GET['download'] == 'polis'){
            $document = new TemplateProcessor(public_path('tamozhnya_documents/polis.docx'));
            $document->setValues([
                'date_issue_policy' => $tamozhnya->date_issue_policy,
                'fio_insurer' => $tamozhnya->policyHolders->FIO,
                'from_date' => $tamozhnya->from_date,
                'to_date'   => $tamozhnya->to_date,
                'strahovaya_sum' =>  $tamozhnya->strahovaya_sum,
                'strahovaya_purpose' => $tamozhnya->strahovaya_purpose,
                'director'     => $tamozhnya->agent->user->branch->director->getFIO(),
                'filial'           => $tamozhnya->agent->user->brnach->name,
            ]);
            $document->saveAs('polis.docx');
            return response()->download('polis.docx');
        }
        return view('products.tamozhnya.add.edit', compact('banks', 'agents', 'tamozhnya'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TamozhnyaAddRequest $request, $id)
    {
        $tamozhnyaAdd = TamozhnyaAdd::findOrFail($id);
        $policyHolders           = PolicyHolder::updatePolicyHolders($tamozhnyaAdd->policy_holder_id, $request);
        if(!$policyHolders)
            return back()->withInput()->withErrors([sprintf('Ошибка при обновлении PolicyHolders')]);
        $policyBeneficiaries     = PolicyBeneficiaries::updatePolicyBeneficiaries($tamozhnyaAdd->policy_beneficiary_id, $request);
        if(!$policyBeneficiaries)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $newPolicyBeneficiaries')]);

        $request->policy_holder_id = $policyHolders->id;
        $request->policy_beneficiary_id = $policyBeneficiaries->id;
        if ($request->hasFile('anketa_img')) {
            $image          = $request->file('anketa_img')->store('/img/PolicyHolder', 'public');
            $request->anketa_img   = $image;
        }
        else
            $request->anketa_img = $tamozhnyaAdd->anketa_img;

        if ($request->hasFile('dogovor_img')) {
            $image          = $request->file('dogovor_img')->store('/img/PolicyHolder', 'public');
            $request->dogovor_img   = $image;
        }
        else
            $request->dogovor_img = $tamozhnyaAdd->dogovor_img;

        if ($request->hasFile('polis_img')) {
            $image          = $request->file('polis_img')->store('/img/PolicyHolder', 'public');
            $request->polis_img   = $image;
        }
        else
            $request->polis_img = $tamozhnyaAdd->polis_img;

        $tamozhnyaAdd = TamozhnyaAdd::updateTamozhnyaAdd($id, $request);
        if(!$tamozhnyaAdd)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении $tamozhnyaAdd')]);
        if(!empty($request->post('payment_sum')) && !empty($request->post('payment_sum')))
        {
            foreach ($request->post('payment_sum') as $key => $sum)
            {
                $newStrahPremiya = \App\Models\Product\TamozhnyaAddStrahPremiya::updateOrCreate([
                    'id' => $key,
                    'tamozhnya_add_id' => $tamozhnyaAdd->id
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
