<?php

namespace App\Http\Controllers\Spravochniki;

use App\Http\Controllers\Controller;
use App\Models\Spravochniki\Agent;
use App\User;
use Illuminate\Http\Request;
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
        $user->password = Hash::make($request->password);
        $user->save();

        $user->agent()->create($request->except('email', 'password'));

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
