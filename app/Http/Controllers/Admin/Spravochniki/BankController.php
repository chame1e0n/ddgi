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
            'route' => 'banks',
        ]);
    }

    /**
     * Show a form to create a new bank.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spravochniki.bank.form', [
            'block' => false,
            'bank' => new Bank(),
        ]);
    }

    /**
     * Store a new bank.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Bank::$validate);

        $bank = new Bank();
        $bank->fill($request['bank']);
        $bank->save();        

        return redirect()->route('banks.index')
                         ->with('success', 'Успешно добавлен новый банк');
    }

    /**
     * Display an existing bank.
     *
     * @param  Bank $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        return view('admin.spravochniki.bank.form', [
            'block' => true,
            'bank' => $bank,
        ]);
    }

    /**
     * Show a form to edit existing bank.
     *
     * @param  Bank $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        return view('admin.spravochniki.bank.form', [
            'block' => false,
            'bank' => $bank,
        ]);
    }

    /**
     * Update an existing bank.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bank $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $request->validate(Bank::$validate);

        $bank->fill($request['bank']);
        $bank->save();

        return redirect()->route('banks.index')
                         ->with('success', sprintf('Данные о банке \'%s\' были успешно обновлены', $bank->name));
    }

    /**
     * Destroy an existing bank.
     * 
     * @param Bank $bank
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();

        return redirect()->route('banks.index')
                         ->with('success', sprintf('Данные о банке \'%s\' были успешно удалены', $bank->name));
    }
}
