<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\Spravochniki\PolicySeries;
use App\Models\Spravochniki\RequestModel;
use App\Perestrahovaniya;
use App\PerestrahovaniyaOverview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PerestrahovaniyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requestModel = Perestrahovaniya::all();
        return view('perestrahovaniya.index', compact('requestModel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $policySeries = PolicySeries::all();

        return view("perestrahovaniya.create", compact('policySeries'));
    }
    public function getPolicyByPolicySeries(Request $request)
    {
        return Policy::where('policy_series_id', $request->input('policy_series_id'))->get()->toJson();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Todo::change policy status
        $request->validate([
//            'status' => 'required',
//            'policy_id' => 'required',
//            'polis_quantity' => 'required',
//            'polis_blank' => 'required',
//            'act_number' => 'required',
//            'limit_reason' => 'required',
        ]);
        if ($file = $request->file('file')) {
            $request->validate([
                'file' => 'required|mimes:jpg,jpeg,bmp,png,doc,docx,xlsx,xls,pdf'
            ]);
            $name = $file->store('request_file', ['disk' => 'public']);
        }
        $perestrahovaniya = Perestrahovaniya::create([
            'user_id' => Auth::id(),
            'file' => $request->file ? $name : '',
            'policy_id' => $request->policy_id,
            'state' => 1,
            'policy_series_id' => $request->policy_series_id,
            'comments' => $request->comments
        ]);
        return redirect()->route('perestrahovaniya.index')
            ->with('success', 'Успешно добавлен новый запрос');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file_type = ["jpg", "jpeg", "bmp", "png"];
        $perestrahovaniya = Perestrahovaniya::findOrFail($id);

        $filename = false;

        if (empty($requestModel->file) != true && in_array(explode(".", $requestModel->file)[1], $file_type) == true) {
            $filename = true;
        }



        return view('perestrahovaniya.show', compact('perestrahovaniya', 'filename'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $perestrahovaniya = Perestrahovaniya::query()->with('perestrahovaniyaOverview')->findOrFail($id);
        $perestrahovaniyaOverview = PerestrahovaniyaOverview::all();
        $policySeries = PolicySeries::all();
        $canAdd = true;
        if (PerestrahovaniyaOverview::query()->where('user_id', Auth::id())->where('id', $id)->get()->count()) {
            $canAdd = false;
        }
        return view('perestrahovaniya.edit', compact('perestrahovaniya', 'perestrahovaniyaOverview', 'policySeries', 'canAdd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $perestrahovaniya = Perestrahovaniya::findOrFail($id);

//        $request->validate([
//            'status' => 'required'
//        ]);

        if ($file = $request->file('file')) {
            $request->validate([
                'file' => 'required|mimes:jpg,jpeg,bmp,png,doc,docx,xlsx,xls,pdf'
            ]);
            Storage::disk('public')->delete($perestrahovaniya->file);
            $name = $file->store('request_file', ['disk' => 'public']);
        }

        $datetime = new \DateTime(date("Y-m-d h:i:s"));

        $perestrahovaniya->update([
            'user_id' => Auth::id(),
            'file' => $request->file ? $name : '',
            'policy_id' => $request->policy_id,
            'state' => 1,
            'policy_series_id' => $request->policy_series_id,
            'comments' => $request->comments
        ]);

        return redirect()->route('perestrahovaniya.index')
            ->with('success', sprintf('Дынные о запросе \'%s\' были успешно обновлены', $request->input('user_id')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perestrahovaniya = Perestrahovaniya::findOrFail($id);
        $perestrahovaniya->delete();

        return redirect()->route('perestrahovaniya.index')
            ->with('success', sprintf('Дынные о запрос \'%s\' были успешно удалены', $perestrahovaniya->from_whom));
    }
    public function upload($id)
    {
        $file = Perestrahovaniya::findOrFail($id);

        $filetype = explode(".", $file->file);

        return Storage::disk('public')->download($file->file, $file->from_whom . "." . $filetype[1]);
    }
}
