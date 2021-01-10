<?php

namespace App\Http\Controllers\Spravochniki;

use App\Http\Controllers\Controller;
use App\Models\Spravochniki\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::latest()->paginate(5);

        return view('spravochniki.bank.index',compact('banks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spravochniki.bank.create');
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
            'status' => 'required',
        ]);

        Bank::create($request->all());

        return redirect()->route('bank.index')
            ->with('success','Успешно добавлен новый банк');
    }

    /**
     * Display the specified resource.
     *
     * @param  Bank $banks
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        return view('spravochniki.bank.edit',compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        return view('spravochniki.bank.edit',compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $bank->update($request->all());

        return redirect()->route('bank.index')
            ->with('success', sprintf('Дынные о банке \'%s\' были успешно обновлены', $request->input('name')));
    }

    /**
     * @param Bank $bank
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();

        return redirect()->route('bank.index')
            ->with('success', sprintf('Дынные о банке \'%s\' были успешно удалены', $bank->name));
    }
}
