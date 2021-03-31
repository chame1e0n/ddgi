<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\TamozhnyaAddLegalRequest;
use App\Models\Dogovor;
use App\Models\Policy;
use App\Models\PolicyHolder;
use App\Models\Product\TamozhnyaAddLegal;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Product\TamozhnyaAddLegalStrahPremiya;
use App\Models\Spravochniki\PolicySeries;
use App\User;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Settings;
use Dompdf\Dompdf;

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
        $policySeries = PolicySeries::all();
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.tamozhnya.add-legal.create', compact('banks', 'agents', 'policySeries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TamozhnyaAddLegalRequest $request)
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

        $policy->update([
            'status' => 'in_use',
            'client_type' => $request->client_type_radio,
        ]);

        $brancId = User::find($request->litso)->branch_id;
        $uniqueNumber = new Dogovor;
        $uniqueNumber = $uniqueNumber->createUniqueNumber(
            $brancId,
            $request->sposob_rascheta,
            5,
            'otvetstvennost_podryadchiks',
            $newTamozhnyaAddLegal->id
        );

        $newTamozhnyaAddLegal->update([
            'unique_number' => $uniqueNumber,
            'policy_id' => $policy->id
        ]);


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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tamozhnya = TamozhnyaAddLegal::getInfoTamozhnya($id);
        $policySeries = PolicySeries::all();
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.tamozhnya.add-legal.show', compact('banks', 'agents', 'tamozhnya', 'policySeries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



        $tamozhnya = TamozhnyaAddLegal::getInfoTamozhnya($id);
        $policySeries = PolicySeries::all();
        $banks = Bank::all();
        $agents = Agent::all();
        if (isset($_GET['download']) && $_GET['download'] == 'dogovor'){
            $document = new TemplateProcessor(public_path('tamozhnya_add_legal/dogovor.docx'));
            $document->setValues([
                'litso' => $tamozhnya->agent->getFio(),
                'fio_insurer' => $tamozhnya->policyHolders->FIO,
                'strahovaya_sum' =>  $tamozhnya->strahovaya_sum,
                'strahovaya_purpose' => $tamozhnya->strahovaya_purpose,
                'address' => $tamozhnya->agent->user->brnach->address,
                'tel'     => $tamozhnya->agent->user->brnach->phone_numner,
                'insurer_address' => $tamozhnya->policyHolders->address,
                'insurer_tel'     => $tamozhnya->policyHolders->phone_number,

                'insurer_schet'     => $tamozhnya->policyHolders->checking_account,
                'insurer_mfo'     => $tamozhnya->policyHolders->inn,
                'insurer_inn'     => $tamozhnya->policyHolders->mfo,
                'insurer_oked'     => $tamozhnya->policyHolders->oked,

            ]);
            $document->saveAs('dogovor.docx');
            return response()->download('dogovor.docx');
//            Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
//            Settings::setPdfRendererPath('.');
//            $phpWord = IOFactory::load('dogovor.docx', 'Word2007');
//            $phpWord->save('document.docx', 'Word2007');
//            $phpWord = IOFactory::load('/tamozhnya_add_legal/document.docx', 'Word2007');
//            $phpWord->save('document.pdf', 'PDF');
//            $phpWord = \PhpOffice\PhpWord\IOFactory::load('dogovor.docx');
//            $random = rand(1000, 3000);
//            // add a window.print() section @ end of HTML
//            $section = $phpWord->addSection();
//            $section->addText('<script>window.print();</script>');
//            // save HTML with a random number on filename
//            $fileLink = 'tamozhnya_add_legal/' . $random . '.html';
//            $phpWord->save($fileLink, 'PDF');
//            unlink('dogovor.docx');
//            return redirect($fileLink);
//            return response()->download('document.pdf');
        }
        if (isset($_GET['download']) && $_GET['download'] == 'za'){
            $document = new TemplateProcessor(public_path('tamozhnya_add_legal/za.docx'));
            $document->setValues([
                'description' => $tamozhnya->description,
                'prichina_pretenzii' => $tamozhnya->prichina_pretenzii,
                'insurer_tel'     => $tamozhnya->policyHolders->phone_number,
                'insurer_schet'     => $tamozhnya->policyHolders->checking_account,
                'insurer_mfo'     => $tamozhnya->policyHolders->inn,
                'insurer_inn'     => $tamozhnya->policyHolders->mfo,
                'litso' => $tamozhnya->agent->getFio(),
                'fio_insurer' => $tamozhnya->policyHolders->FIO,
            ]);
            $document->saveAs('za.docx');
            return response()->download('za.docx');
        }
        if (isset($_GET['download']) && $_GET['download'] == 'polis'){
            $document = new TemplateProcessor(public_path('tamozhnya_add_legal/polis.docx'));
            $document->setValues([
                'date_issue_policy' => $tamozhnya->date_issue_policy,
                'fio_insurer' => $tamozhnya->policyHolders->FIO,
                'from_date' => $tamozhnya->from_date,
                'to_date'   => $tamozhnya->to_date,
                'strahovaya_sum' =>  $tamozhnya->strahovaya_sum,
                'strahovaya_purpose' => $tamozhnya->strahovaya_purpose,
                'director'     => $tamozhnya->agent->user->branch->director->getFIO(),
            ]);
            $document->saveAs('polis.docx');
            return response()->download('polis.docx');
        }
        return view('products.tamozhnya.add-legal.edit', compact('banks', 'agents', 'tamozhnya', 'policySeries'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
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
        if ($tamozhnyaAddLegal->payment_term == '1') {
            $delStrahPremiya = TamozhnyaAddLegalStrahPremiya::where('tamozhnya_add_legal_id', $tamozhnyaAddLegal->id)->delete();
        } else {
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
