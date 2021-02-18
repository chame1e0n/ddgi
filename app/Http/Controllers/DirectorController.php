<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Models\Spravochniki\Branch;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors = Director::latest()->paginate(5);

        return view('director.index',compact('directors'))
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

        return view('director.create', compact('branches'));
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
        $user->branch_id = $request->branch_id;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->director()->create($request->except('email', 'password', 'branch_id'));

        return redirect()->route('director.index')
            ->with('success','Успешно добавлен новый директор');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function show(Director $director)
    {
        return $this->edit($director);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function edit(Director $director)
    {
        $branches = Branch::all();

        return view('director.edit',compact('director', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Director $director)
    {
        $user = User::find($director->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->branch_id = $request->branch_id;
        if(!empty($user->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $director->update($request->except('email', 'password', 'branch_id'));

        return redirect()->route('director.index')
            ->with('success', sprintf('Дынные о директоре \'%s\' были успешно обновлены', $request->input('name')));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function destroy(Director $director)
    {
        $director->delete();

        return redirect()->route('director.index')
            ->with('success', sprintf('Дынные об директоре \'%s\' были успешно удалены', $director->name));
    }
}
