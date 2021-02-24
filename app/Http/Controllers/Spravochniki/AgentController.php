<?php

namespace App\Http\Controllers\Spravochniki;

use App\Http\Controllers\Controller;
use App\Models\Spravochniki\Agent;
use App\User;
use App\UserFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::latest()->paginate(5);

        return view('spravochniki.agent.index',compact('agents'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spravochniki.agent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;



        $user->name = $request->name;
        $user->email = $request->email;
        $user->branch_id = 1;
        $user->password = Hash::make($request->password);
//        dd($request->except('email', 'password'));
        $user->save();

        $logoName = '';
        if ($request->has('profile_img')) {
            $logoName = 'profile_img_' . time() . '.' . $request->profile_img->getClientOriginalExtension();
            $request->profile_img->move(public_path('agents/' . $user->id), $logoName);
        }
        $agent_agreement_img = '';
        if ($request->has('agent_agreement_img')) {
            $agent_agreement_img = 'agent_agreement_img_' . time() . '.' . $request->agent_agreement_img->getClientOriginalExtension();
            $request->agent_agreement_img->move(public_path('agents/' . $user->id), $agent_agreement_img);
        }

        $labor_contract = '';
        if ($request->has('labor_contract')) {
            $labor_contract = 'labor_contract_' . time() . '.' . $request->labor_contract->getClientOriginalExtension();
            $request->labor_contract->move(public_path('agents/' . $user->id), $labor_contract);
        }

        $firm_contract = '';
        if ($request->has('firm_contract')) {
            $firm_contract = 'firm_contract_' . time() . '.' . $request->firm_contract->getClientOriginalExtension();
            $request->firm_contract->move(public_path('agents/' . $user->id), $firm_contract);
        }

        $license = '';
        if ($request->has('license')) {
            $license = 'license_' . time() . '.' . $request->license->getClientOriginalExtension();
            $request->license->move(public_path('agents/' . $user->id), $license);
        }


        $user->agent()->create([
            'user_id' => $user->id,
            'surname' => $request->surname,
            'name' => $request->name,
            'middle_name' => $request->middle_name,
            'dob' => $request->dob,
            'passport_series' => $request->passport_series,
            'passport_number' => $request->passport_number,
            'job' => $request->job,
            'work_start_date' => $request->work_start_date,
            'work_end_date' => $request->work_end_date,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'status' => $request->status,
            'profile_img' => 'agents/' . $user->id . '/' .$logoName,
            'agent_agreement_img' => 'agents/' . $user->id . '/' .$agent_agreement_img,
            'labor_contract' => 'agents/' . $user->id . '/' .$labor_contract,
            'firm_contract' => 'agents/' . $user->id . '/' .$firm_contract,
            'license' => 'agents/' . $user->id . '/' .$license,
        ]);

        return redirect()->route('agent.index')
            ->with('success','Успешно добавлен новый агент');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spravochniki\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        return view('spravochniki.agent.edit',compact('agent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spravochniki\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        return view('spravochniki.agent.edit',compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spravochniki\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        $user = User::find($agent->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($user->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $agent->update($request->except('email', 'password'));

        return redirect()->route('agent.index')
            ->with('success', sprintf('Дынные об агенте \'%s\' были успешно обновлены', $request->input('name')));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        $agent->delete();

        return redirect()->route('agent.index')
            ->with('success', sprintf('Дынные об агенте \'%s\' были успешно удалены', $agent->name));
    }
}
