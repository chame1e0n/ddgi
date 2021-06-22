<?php

namespace App\Http\Controllers\Admin\Spravochniki;

use App\Http\Controllers\Controller;
use App\Model\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
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
            'route' => 'currency',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spravochniki.currency.form', [
            'object' => new Currency(),
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
        $this->saveObject(new Currency());

        return redirect()->route('currency.index')
            ->with('success', 'Успешно добавлена новая валюта');
    }

    /**
     * Display the specified resource.
     *
     * @param  Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        return view('admin.spravochniki.currency.form', compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return view('admin.spravochniki.currency.form', [
                'object' => $currency,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Currency $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        $this->saveObject($currency);

        return redirect()->route('currency.index')
            ->with('success', sprintf('Дынные о валюте \'%s\' были успешно обновлены', $currency->name));
    }

    protected function saveObject($currency) {
        request()->validate([
            'currency.name' => 'required',
        ]);

        $currency->fill(request('currency'));
        $currency->save();
    }

    /**
     * @param Currency $currency
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();

        return redirect()->route('currency.index')
            ->with('success', sprintf('Дынные о валюте \'%s\' были успешно удалены', $currency->name));
    }
}
