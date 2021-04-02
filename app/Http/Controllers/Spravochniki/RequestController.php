<?php

namespace App\Http\Controllers\Spravochniki;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;
use App\Models\Spravochniki\RequestModel;
use Illuminate\Support\Facades\Storage;
use App\Models\Spravochniki\PolicySeries;
use Mockery\Exception;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requestModel = RequestModel::all();
        $status = RequestModel::STATUS;
        return view('spravochniki.request.index', compact('requestModel', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = RequestModel::STATUS;

        $policySeries = PolicySeries::all();
        $policySeries = PolicySeries::all();

        return view("spravochniki.request.create", compact('status', 'policySeries'));
    }

    public function getPolicyByPolicySeries(Request $request)
    {
        return Policy::where('policy_series_id', $request->input('policy_series_id'))->get()->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Todo::change policy status
        $request->validate([
            'status' => 'required',
        ]);

        if ($file = $request->file('file')) {
            $request->validate([
                'file' => 'required|mimes:jpg,jpeg,bmp,png,doc,docx,xlsx,xls,pdf'
            ]);
            $name = $file->store('request_file', ['disk' => 'public']);
        }

        RequestModel::create([
            'user_id' => \Auth::user()->id,
            'status' => $request->status,
            'file' => $request->file ? $name : '',
            'policy_id' => $request->policy_id,
            'policy_series_id' => $request->policy_series_id,
            'act_number' => $request->act_number ?? null,
            'limit_reason' => $request->limit_reason ?? null,
            'polis_quantity' => $request->polis_quantity ?? null,
            'comments' => $request->comments
        ]);

        return redirect()->route('request.index')
            ->with('success', 'Успешно добавлен новый запрос');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file_type = ["jpg", "jpeg", "bmp", "png"];
        $requestModel = RequestModel::findOrFail($id);

        $filename = false;

        if (empty($requestModel->file) != true && in_array(explode(".", $requestModel->file)[1], $file_type) == true) {
            $filename = true;
        }

        $status = RequestModel::STATUS[$requestModel->status];


        return view('spravochniki.request.show', compact('requestModel', 'status', 'filename'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requestModel = RequestModel::findOrFail($id);
        $status = RequestModel::STATUS;
        $policySeries = PolicySeries::all();
        return view('spravochniki.request.edit', compact('requestModel', 'status', 'policySeries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestModel = RequestModel::findOrFail($id);

        $request->validate([
            'status' => 'required'
        ]);

        if ($file = $request->file('file')) {
            $request->validate([
                'file' => 'required|mimes:jpg,jpeg,bmp,png,doc,docx,xlsx,xls,pdf'
            ]);
            Storage::disk('public')->delete($requestModel->file);
            $name = $file->store('request_file', ['disk' => 'public']);
        }

        $datetime = new \DateTime(date("Y-m-d h:i:s"));

        $requestModel->update([
            'user_id' => \Auth::user()->id,
            'status' => $request->status,
            'file' => $request->file ? $name : '',
            'policy_id' => $request->policy_id,
            'policy_series_id' => $request->policy_series_id,
            'act_number' => $request->act_number ?? null,
            'limit_reason' => $request->limit_reason ?? null,
            'polis_quantity' => $request->polis_quantity ?? null,
            'comments' => $request->comments
        ]);

        return redirect()->route('request.index')
            ->with('success', sprintf('Дынные о запросе \'%s\' были успешно обновлены', $request->input('user_id')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requestModel = RequestModel::findOrFail($id);
        $requestModel->delete();

        return redirect()->route('request.index')
            ->with('success', sprintf('Дынные о запрос \'%s\' были успешно удалены', $requestModel->from_whom));

    }


    public function upload($id)
    {
        $file = RequestModel::findOrFail($id);

        $filetype = explode(".", $file->file);

        return Storage::disk('public')->download($file->file, $file->from_whom . "." . $filetype[1]);
    }
}
