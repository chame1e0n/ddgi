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
//        $directors = Director::latest()->paginate(5);
        $directors = Director::all();

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
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'profile_img' => 'mimes:jpg,bmp,png,pdf,doc',
            'last_name' => 'required',
            'name' => 'required',
            'middle_name' => 'required',
            'dob' => 'required',
            'passport_series' => 'required',
            'passport_number' => 'required',
            'branch_id' => 'required',
            'work_start_date' => 'required',
            'work_end_date' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'email' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->has('profile_img')) {
            $image = $request->file('profile_img')->store('/directors/'.$user->id, 'public');
            $request->profile_img = $image;
        }


        $user->director()->create([
            'user_id' => $user->id,
            'surname' => $request->surname,
            'name' => $request->name,
            'middle_name' => $request->middle_name,
            'dob' => $request->dob,
            'passport_series' => $request->passport_series,
            'passport_number' => $request->passport_number,
            'work_start_date' => $request->work_start_date,
            'work_end_date' => $request->work_end_date,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'profile_img' => $request->has('profile_img') ? $request->profile_img : null,
            'status' => $request->status,

        ]);

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
        if(!empty($user->password)) {
            $user->password = Hash::make($request->password);
        }

        if ($request->has('profile_img')) {
            $image = $request->file('profile_img')->store('/directors/'.$user->id, 'public');
            $request->profile_img = $image;
        }

        $user->save();

        $director->update([
            'surname' => $request->surname,
            'name' => $request->name,
            'middle_name' => $request->middle_name,
            'dob' => $request->dob,
            'passport_number' => $request->passport_number,
            'passport_series' => $request->passport_series,
            'work_start_date' => $request->work_start_date,
            'work_end_date' => $request->work_end_date,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'profile_img' => $request->profile_img,
            'status' => $request->status,
        ]);

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
