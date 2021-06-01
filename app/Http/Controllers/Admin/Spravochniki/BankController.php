<?php

namespace App\Http\Controllers\Admin\Spravochniki;

use App\Http\Controllers\Controller;
use App\Model\Bank;
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
        $banks = Bank::all();

        return view('admin.layouts.index-layout', [
            'objects' => $banks,
            'title' => 'Банки',
            'fields' => [
                'name' => 'Наименование',
                'code' => 'Код'
            ],
            'route' => 'bank'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.common.create', [
            'object' => new Bank(),
            'form_path' => 'admin.spravochniki.bank.form'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->saveObject(new Bank(request('bank')));

        return redirect()->route('bank.index')
            ->with('success', 'Успешно добавлен новый банк');
    }

    /**
     * Display the specified resource.
     *
     * @param  Bank $banks
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        return view('admin.spravochniki.bank.edit', compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Bank $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        return view('admin.common.edit', [
                'object' => $bank,
                'form_path' => 'admin.spravochniki.bank.form'
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bank $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $bank->update(request('bank'));
        $this->saveObject($bank);

        return redirect()->route('bank.index')
            ->with('success', sprintf('Дынные о банке \'%s\' были успешно обновлены', $bank->name));
    }

    protected function saveObject($bank) {
        request()->validate([
            'bank.code' => 'required',
            'bank.name' => 'required',
            'bank.filial' => 'required',
            'bank.address' => 'required',
            'bank.inn' => 'required',
            'bank.account' => 'required'
        ]);

        $bank->save();
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

    public function getAllBanks(Request $request)
    {
        return Bank::select('id', 'code as mfo', 'name')->get()->toJson();
    }
}
