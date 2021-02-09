<?php

namespace App\Http\Controllers\Spravochniki;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spravochniki\RequestModel;
use Illuminate\Support\Facades\Storage;


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
        return view("spravochniki.request.create", compact('status'));
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
            'from_whom'=>'required',
            'status' => 'required'
        ]);

        if ($file = $request->file('file')){
            $request->validate([
                'file'=>'required|mimes:jpg,jpeg,bmp,png,doc,docx,xlsx,xls,pdf'
            ]);
            $name = $file->store('request_file', ['disk' => 'public']);
        }

        $datetime = new \DateTime(date("Y-m-d h:i:s"));

        RequestModel::create([
            'from_whom' => $request->from_whom,
            'status' => $request->status,
            'file' => $request->file ? $name : '',
            'series' => $request->series,
            'policy_blank' => $request->policy_blank,
            'comments' =>  $request->comments, 
            'data_of_request' => $datetime
        ]);

        return redirect()->route('request.index')
            ->with('success','Успешно добавлен новый запрос');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file_type = ["jpg","jpeg","bmp","png"];
        $requestModel = RequestModel::findOrFail($id);
        
        $filename = false;

        if (in_array(explode(".", $requestModel->file)[1], $file_type) == true)
        {
            $filename = true;
        }

        $status = RequestModel::STATUS[$requestModel->status];



        return view('spravochniki.request.show', compact('requestModel', 'status', 'filename'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requestModel = RequestModel::findOrFail($id);
        $status = RequestModel::STATUS;

        return view('spravochniki.request.edit', compact('requestModel', 'status'));
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
        $requestModel = RequestModel::findOrFail($id);

        $request->validate([
            'from_whom'=>'required',
            'status' => 'required'
        ]);

        if ($file = $request->file('file')){
            $request->validate([
                'file'=>'required|mimes:jpg,jpeg,bmp,png,doc,docx,xlsx,xls,pdf'
            ]);
            Storage::disk('public')->delete($requestModel->file);
            $name = $file->store('request_file', ['disk' => 'public']);
        }

        $datetime = new \DateTime(date("Y-m-d h:i:s"));

        $requestModel->update([
            'from_whom' => $request->from_whom,
            'status' => $request->status,
            'file' => $request->file ? $name : '',
            'series' => $request->series,
            'policy_blank' => $request->policy_blank,
            'comments' =>  $request->comments, 
            'data_of_request' => $datetime
        ]);

        return redirect()->route('request.index')
            ->with('success', sprintf('Дынные о банке \'%s\' были успешно обновлены', $request->input('from_whom')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
       
        return Storage::disk('public')->download($file->file, $file->from_whom.".".$filetype[1]);
    }
}
