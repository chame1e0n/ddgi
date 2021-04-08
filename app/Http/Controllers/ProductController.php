<?php

namespace App\Http\Controllers;

use App\Models\Klass;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('spravochniki.product.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klasses = Klass::all();

        return view('spravochniki.product.create', compact('klasses'));
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
            'klass_id' => 'required',
            'tarif' => 'required',
            'max_acceptable_amount' => 'required',
        ]);
        Product::create($request->all());

        return redirect()->route('product.index')
            ->with('success','Успешно добавлена новый продукт');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $this->edit($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $klasses = Klass::all();

        return view('spravochniki.product.edit',compact('product', 'klasses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->route('product.index')
            ->with('success', sprintf('Дынные о продукте \'%s\' были успешно обновлены', $request->input('name')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')
            ->with('success', sprintf('Дынные о продукте \'%s\' были успешно удалены', $product->name));
    }
}
