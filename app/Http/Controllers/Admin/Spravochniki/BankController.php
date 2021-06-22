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
        return view('admin.layouts.index-layout', [
            'objects' => Bank::all(),
            'title' => 'Банки',
            'fields' => [
                'name' => 'Наименование',
                'code' => 'Код',
            ],
            'route' => 'bank',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spravochniki.bank.form', [
            'object' => new Bank(),
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
        $this->saveObject(new Bank());

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
        return view('admin.spravochniki.bank.form', compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Bank $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        return view('admin.spravochniki.bank.form', [
                'object' => $bank,
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

        $bank->fill(request('bank'));
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
