<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNotaryRequest;
use App\Models\Notary;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class NotaryController extends Controller
{
    /**
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('products.otvetstvennost.notaries.create');
    }

    public function store(StoreNotaryRequest $request)
    {
        dd($request->all());

        $period_polis = json_encode($request->period_polis);
        Notary::create([
            'period_polis' => $period_polis,
            ''
        ]);
        dd($request->all());
    }

    public function show($id)
    {
        dd('asdasdasd');
    }
}
