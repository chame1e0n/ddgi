<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\TamozhnyaAddLegalRequest;
use App\Models\Dogovor;
use App\Models\Policy;
use App\Models\PolicyHolder;
use App\Models\Product;
use App\Models\Product\TamozhnyaAddLegal;
use App\Models\Product\TamozhnyaAddLegalStrahPremiya;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Settings;
use Dompdf\Dompdf;
use App\Helpers\Convertio\Convertio;

class TamozhnyaAddLegalController extends Controller
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
        $product = Product::where('name', 'Таможенный платеж')->first();
        // need to make a limitations for user and status
        $policies = Policy::all();
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.tamozhnya.add-legal.create', compact('banks', 'agents', 'policySeries', 'product'));
    }

    public function countStrahovayaPremiya($strahovayaSumma, $isCustomTarif, $customTarif, $productId)
    {
        if ($isCustomTarif == 'on') {
            return ($customTarif / 100 * $strahovayaSumma);
        }

        $productTarif = Product::find($productId)->tarif;

        return ($productTarif / 100 * $strahovayaSumma);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
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

        $request->strahovaya_purpose = $this->countStrahovayaPremiya(
            $request->strahovaya_sum,
            $request->isOtherTarif ?? 0,
            $request->otherTarif,
            $request->product_id
        );

        $newTamozhnyaAddLegal = TamozhnyaAddLegal::createTamozhnyaAddLegal($request);
        if (!$newTamozhnyaAddLegal)
            return back()->withInput()->withErrors([sprintf('Ошибка при добавлении TamozhnyaAddLegal')]);

        $brancId = Agent::find(1)->user->branch_id;

        $policy->update([
            'status' => 'in_use',
        ]);

        $uniqueNumber = new Dogovor;
        $uniqueNumber = $uniqueNumber->createUniqueNumber(
            $brancId,
            $request->sposob_rascheta,
            5,
            'tamozhnya_add_legals',
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
     * @param int $id
     * @return Response
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
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $tamozhnya = TamozhnyaAddLegal::getInfoTamozhnya($id);
        $policySeries = PolicySeries::all();
        $banks = Bank::all();
        $agents = Agent::all();
        if (isset($_GET['download']) && $_GET['download'] == 'dogovor') {
            $document = new TemplateProcessor(public_path('tamozhnya_add_legal/dogovor.docx'));
            $document->setValues([
                'y' => $tamozhnya->created_at->year,
                'month' => $tamozhnya->created_at->month,
                'day' => $tamozhnya->created_at->day,
                'unique_number' => $tamozhnya->unique_number,
                'litso' => $tamozhnya->agent->getFio(),
                'fio_insurer' => $tamozhnya->policyHolders->FIO,
                'strahovaya_sum' => $tamozhnya->strahovaya_sum,
                'strahovaya_purpose' => $tamozhnya->strahovaya_purpose,
                'address' => $tamozhnya->agent->user->brnach->address,
                'tel' => $tamozhnya->agent->user->brnach->phone_numner,
                'insurer_address' => $tamozhnya->policyHolders->address,
                'insurer_tel' => $tamozhnya->policyHolders->phone_number,

                'insurer_schet' => $tamozhnya->policyHolders->checking_account,
                'insurer_mfo' => $tamozhnya->policyHolders->inn,
                'insurer_inn' => $tamozhnya->policyHolders->mfo,
                'insurer_oked' => $tamozhnya->policyHolders->oked,

            ]);
            $document->saveAs('dogovor.docx');
            try {
                $API = new Convertio(config('app.convertioKey'));
                $API->start('dogovor.docx', 'pdf')->wait()->download('dogovor.pdf')->delete();
                echo "<script>window.open('".config('app.url')."/dogovor.pdf', '_blank').print()</script>";
            }
            catch (\Exception $e)
            {
                return redirect('/dogovor.docx');
            }
        }
        if (isset($_GET['download']) && $_GET['download'] == 'za') {
            $document = new TemplateProcessor(public_path('tamozhnya_add_legal/za.docx'));
            $document->setValues([
                'description' => $tamozhnya->description,
                'prichina_pretenzii' => $tamozhnya->prichina_pretenzii,
                'insurer_tel' => $tamozhnya->policyHolders->phone_number,
                'insurer_schet' => $tamozhnya->policyHolders->checking_account,
                'insurer_mfo' => $tamozhnya->policyHolders->inn,
                'insurer_inn' => $tamozhnya->policyHolders->mfo,
                'litso' => $tamozhnya->agent->getFio(),
                'fio_insurer' => $tamozhnya->policyHolders->FIO,
            ]);
            $document->saveAs('za.docx');
            try {
                $API = new Convertio(config('app.convertioKey'));
                $API->start('za.docx', 'pdf')->wait()->download('za.pdf')->delete();
                echo "<script>window.open('".config('app.url')."/za.pdf', '_blank').print()</script>";
            }
            catch (\Exception $e)
            {
                return redirect('/za.docx');
            }
        }
        if (isset($_GET['download']) && $_GET['download'] == 'polis') {
            $document = new TemplateProcessor(public_path('tamozhnya_add_legal/polis.docx'));
            $document->setValues([
                'date_issue_policy' => $tamozhnya->date_issue_policy,
                'fio_insurer' => $tamozhnya->policyHolders->FIO,
                'from_date' => $tamozhnya->from_date,
                'to_date' => $tamozhnya->to_date,
                'strahovaya_sum' => $tamozhnya->strahovaya_sum,
                'strahovaya_purpose' => $tamozhnya->strahovaya_purpose,
                'director' => $tamozhnya->agent->user->branch->director->getFIO(),
            ]);
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

        $requestUnderwrittingProblem = false;

        if ($tamozhnya->product->max_acceptable_amount < $tamozhnya->strahovaya_sum) {
            if ($tamozhnya->requests()->exists()) {
                foreach ($tamozhnya->requests as $req) {
                    if ($req->status != 'underwritting' or $req->state != 2) {
                        $requestUnderwrittingProblem = true;
                    }
                }
            } else {
                $requestUnderwrittingProblem = true;
            }
        }

        return view('products.tamozhnya.add-legal.edit', compact('banks', 'agents', 'tamozhnya', 'policySeries', 'requestUnderwrittingProblem'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
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

        $request->strahovaya_purpose = $this->countStrahovayaPremiya(
            $request->strahovaya_sum,
            $request->isOtherTarif ?? 0,
            $request->otherTarif,
            $request->product_id
        );

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
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $tamozhnyaAddLegal = TamozhnyaAddLegal::find($id);
        $tamozhnyaAddLegal->delete();

        return redirect()->route('all_products.index')
            ->with('success', sprintf('Дынные о продукте %s были успешно удалены', $tamozhnyaAddLegal->unique_number));
    }
}
