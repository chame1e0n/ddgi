<?php

namespace App\Http\Controllers\Spravochniki;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Spravochniki\Bank;
use Illuminate\Http\Request;

class IndividualClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $individualClients = Client::individual()->latest()->paginate(5);

        return view('spravochniki.individual_client.index',compact('individualClients'))
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
        return view('spravochniki.individual_client.create', compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Client::create(array_merge($request->all(), ['type' => 0]));

        return redirect()->route('individual_client.index')
            ->with('success','Успешно добавлен новый клиент');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $individualClient
     * @return \Illuminate\Http\Response
     */
    public function show(Client $individualClient)
    {
        $banks = Bank::all();
        return view('spravochniki.individual_client.edit',compact('individualClient', 'banks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $individualClient
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $individualClient)
    {
        $banks = Bank::all();
        return view('spravochniki.individual_client.edit',compact('individualClient', 'banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $individualClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $individualClient)
    {
        $individualClient->update($request->all());

        return redirect()->route('individual_client.index')
            ->with('success', sprintf('Дынные о клиенте \'%s\' были успешно обновлены', $request->input('name')));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $individualClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $individualClient)
    {
        $individualClient->delete();

        return redirect()->route('individual_client.index')
            ->with('success', sprintf('Дынные о клиенте \'%s\' были успешно удалены', $individualClient->name));
    }
}
