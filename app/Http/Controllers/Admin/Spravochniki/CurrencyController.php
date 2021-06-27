<?php

namespace App\Http\Controllers\Admin\Spravochniki;

use App\Http\Controllers\Controller;
use App\Model\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a list of all currencies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.layouts.index-layout', [
            'objects' => Currency::all(),
            'title' => 'Валюты',
            'fields' => [
                'name' => 'Валюта',
                'code' => 'КОД',
                'priority' => 'Приоритет',
                'created_at' => 'Создан',
            ],
            'route' => 'currencies',
        ]);
    }

    /**
     * Show a form to create a new currency.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spravochniki.currency.form', [
            'block' => false,
            'currency' => new Currency(),
        ]);
    }

    /**
     * Store a new currency.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Currency::$validate);

        $currency = new Currency();
        $currency->fill($request['currency']);
        $currency->save();

        return redirect()->route('currencies.index')
                         ->with('success', 'Успешно добавлена новая валюта');
    }

    /**
     * Display an existing currency.
     *
     * @param  \App\Model\Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        return view('admin.spravochniki.currency.form', [
            'block' => true,
            'currency' => $currency,
        ]);
    }

    /**
     * Show a form to edit existing currency.
     *
     * @param  \App\Model\Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return view('admin.spravochniki.currency.form', [
            'block' => false,
            'currency' => $currency,
        ]);
    }

    /**
     * Update an existing currency.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        $request->validate(Currency::$validate);

        $currency->fill($request['currency']);
        $currency->save();

        return redirect()->route('currencies.index')
                         ->with('success', sprintf('Данные о валюте \'%s\' были успешно обновлены', $currency->name));
    }

    /**
     * Destroy an existing currency.
     * 
     * @param \App\Model\Currency $currency
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();

        return redirect()->route('currencies.index')
                         ->with('success', sprintf('Данные о валюте \'%s\' были успешно удалены', $currency->name));
    }
}
