<?php

namespace App\Http\Controllers;

use App\Models\FromSiteOrder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

class FromSiteOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = FromSiteOrder::all();

        return view('site_order.index',compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Refreshing all data according sites data
     */
    public function refresh()
    {
        // php artisan site:getData
        Artisan::call('site:getData');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = FromSiteOrder::find($id);

        return view('site_order.show',compact('order'));
    }
}
