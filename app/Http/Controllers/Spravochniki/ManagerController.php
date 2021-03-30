<?php

namespace App\Http\Controllers\Spravochniki;

use App\Http\Controllers\Controller;
use App\Models\Spravochniki\Branch;
use App\Models\Spravochniki\Manager;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $managers = Manager::latest()->paginate(5);
        $managers = Manager::all();

        return view('spravochniki.manager.index',compact('managers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();

        return view('spravochniki.manager.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
//            'profile_img' => 'mimes:jpg,bmp,png,pdf,doc',
//            'agent_agreement_img' => 'mimes:jpg,bmp,png,pdf,doc',
//            'labor_contract' => 'mimes:jpg,bmp,png,pdf,doc',
//            'firm_contract' => 'mimes:jpg,bmp,png,pdf,doc',
//            'license' => 'mimes:jpg,bmp,png,pdf,doc',
            'surname' => 'required',
            'name' => 'required',
            'middle_name' => 'required',
            'dob' => 'required',
            'passport_series' => 'required',
            'passport_number' => 'required',
            'job' => 'required',
            'work_start_date' => 'required',
            'work_end_date' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'email' => 'required | unique:users',
            'password' => 'required',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->branch_id = $request->branch_id;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->manager()->create($request->except('email', 'password', 'branch_id'));

        return redirect()->route('manager.index')
            ->with('success','Успешно добавлен новый агент');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spravochniki\manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        return view('spravochniki.manager.edit',compact('manager'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spravochniki\manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        return view('spravochniki.manager.edit',compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spravochniki\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        $user = User::find($manager->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($user->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $manager->update($request->except('email', 'password'));

        return redirect()->route('manager.index')
            ->with('success', sprintf('Дынные об менеджере \'%s\' были успешно обновлены', $request->input('name')));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spravochniki\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        $manager->delete();

        return redirect()->route('manager.index')
            ->with('success', sprintf('Дынные об менеджере \'%s\' были успешно удалены', $manager->name));
    }
}
