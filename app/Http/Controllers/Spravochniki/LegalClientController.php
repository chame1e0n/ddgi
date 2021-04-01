<?php

namespace App\Http\Controllers\Spravochniki;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Spravochniki\Bank;
use Illuminate\Http\Request;

class LegalClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $legalClients = Client::legal()->latest()->paginate(5);

        return view('spravochniki.legal_client.index',compact('legalClients'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Bank::all();
        return view('spravochniki.legal_client.create',  compact('banks'));
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
            'address' => 'required',
            'phone_number' => 'required',
            'bank_id' => 'required',
            'raschetniy_schet' => 'required',
        ]);
        Client::create(array_merge($request->all(), ['type' => 1]));

        return redirect()->route('legal_client.index')
            ->with('success','Успешно добавлен новый клиент');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $legalClient
     * @return \Illuminate\Http\Response
     */
    public function show(Client $legalClient)
    {
        $banks = Bank::all();
        $legalClient->legal();
        return view('spravochniki.legal_client.edit',compact('legalClient', 'banks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $legalClient
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $legalClient)
    {
        $banks = Bank::all();
        $legalClient->legal();
        return view('spravochniki.legal_client.edit',compact('legalClient', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $legalClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $legalClient)
    {
        $legalClient->update($request->all());

        return redirect()->route('legal_client.index')
            ->with('success', sprintf('Дынные о клиенте \'%s\' были успешно обновлены', $request->input('name')));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $legalClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $legalClient)
    {
        $legalClient->delete();

        return redirect()->route('legal_client.index')
            ->with('success', sprintf('Дынные о клиенте \'%s\' были успешно удалены', $legalClient->name));

    }
}
