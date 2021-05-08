<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNotaryRequest;
use App\Models\Notary;
use App\Models\NotaryGrey;
use App\Models\NotaryPaymentTerm;
use App\Models\PolicyHolder;
use App\Models\Spravochniki\Agent;
use App\Models\Spravochniki\Bank;
use App\Models\Spravochniki\PolicySeries;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NotaryController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $polis_series = PolicySeries::all();
        $banks = Bank::all();
        $agents = Agent::all();
        return view('products.otvetstvennost.notaries.create', compact('polis_series', 'banks', 'agents'));
    }

    /**
     * @param Request $request
     */
    public function store(StoreNotaryRequest $request)
    {
//        dd($request->all());

        PolicyHolder::create([
            'FIO' => $request->fio_insurer,
            'address' => $request->address_insurer,
            'phone_number' => $request->phone_insurer,
            'checking_account' => $request->payment_bill,
            'vid_deyatelnosti' => $request->insurer_type_active,
            'mfo' => $request->mfo_insurer,
            'inn' => $request->inn,
            'okonx' => $request->okonh_insurer,
            'bank_id' => $request->bank_insurer,
            'oked' => $request->oked_insurer,
        ]);

        for ($i = 0; $i < count($request->number); $i++) {
            NotaryGrey::create([
                'number' => $request->number[$i],
                'director' => $request->director[$i],
                'qualified' => $request->qualified[$i],
                'other' => $request->other[$i],
            ]);
        }

        $year = json_encode($request->year);
        $turnover = json_encode($request->turnover);
        $earnings = json_encode($request->earnings);

        if ($request->hasFile('anketaFile')) {
            $image = $request->file('anketaFile')->store('/img/Notaries', 'public');
            $request->anketaFile = $image;
        }

        if ($request->hasFile('dogovorFile')) {
            $image = $request->file('dogovorFile')->store('/img/Notaries', 'public');
            $request->dogovorFile = $image;
        }

        if ($request->hasFile('polisFile')) {
            $image = $request->file('polisFile')->store('/img/Notaries', 'public');
            $request->polisFile = $image;
        }

        if ($request->hasFile('retransferAktFile')) {
            $image = $request->file('retransferAktFile')->store('/img/Notaries', 'public');
            $request->retransferAktFile = $image;
        }
        $notary = Notary::create([
            'info_personal' => $request->info_personal,
            'insurance_from' => $request->insurance_from,
            'insurance_to' => $request->insurance_to,
            'geo_zone' => $request->geo_zone,
            'year' => $year,
            'turnover' => $turnover,
            'earnings' => $earnings,
            'activity_period_from' => $request->activity_period_from,
            'activity_period_to' => $request->activity_period_to,
            'acted' => $request->acted ? 1 : 0,
            'public_sector_comment' => $request->public_sector_comment,
            'private_sector_comment' => $request->private_sector_comment,
            'riski' => $request->riski,
            'other_insurance_0' => $request->other_insurance_0,
            'reason_case' => $request->reason_case,
            'administrative_case' => $request->administrative_case ? 1 : 0,
            'reason_administrative_case' => $request->reason_administrative_case,
            'sphereOfActivity' => $request->sphereOfActivity,
            'profInsuranceServices' => $request->profInsuranceServices,
            'retransferAktFile' => $request->retransferAktFile,
            'wallet' => $request->wallet,
            'sum_insured' => $request->sum_insured,
            'franchise' => $request->franchise,
            'insurance_premium' => $request->insurance_premium,
            'polis_series' => $request->polis_series,
            'insurance_policy_from' => $request->insurance_policy_from,
            'anketaFile' => $request->anketaFile,
            'dogovorFile' => $request->dogovorFile,
            'polisFile' => $request->polisFile,
            'litso' => $request->litso,
            'payment_term' => $request->payment_term,
        ]);

        if ($request->payment_term == 'other') {
//            dd($request->payment_term);
            for ($i = 0; $i < count($request->payment_sum); $i++) {
                NotaryPaymentTerm::create([
                    'payment_sum' => $request->payment_sum[$i],
                    'payment_from' => $request->payment_from[$i],
                    'notary_id' => $notary->id
                ]);
            }
        }

        //TODO after fix front
//        for ($i = 0; $i < count($request->period_polis); $i++){
//            NotaryInfo::create([
//                'period_polis' => $request->period_polis[$i],
//                'polis_id' => PolicySeries::create(['code' => $request->polis_id[$i]])->id,
//                'validity_period_from' => $request->validity_period_from[$i],
//                'validity_period_to' => $request->validity_period_to[$i],
//                'polis_agent' => $request->polis_agent[$i],
//                'polis_mark' => $request->polis_mark[$i],
//                'specialty' => $request->specialty, // Maybe not correct work because is not array
//                'workExp' => $request->workExp, // Maybe not correct work because is not array
//                'polis_model' => $request->polis_model[$i],
//                'polis_modification' => $request->polis_modification[$i],
//                'polis_gos_num' => $request->polis_gos_num[$i],
//                'polis_teh_passport' => $request->polis_teh_passport[$i],
//            ]);
//        }

        dd($request->all());
    }

    public function show($id)
    {
        dd('asdasdasd');
    }
}
