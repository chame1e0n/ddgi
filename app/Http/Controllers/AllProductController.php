<?php

namespace App\Http\Controllers;

use App\Bonded;
use App\Models\Product\AllProduct;
use App\Models\Product\Cmp;
use App\Models\Product\Kasko;
use App\Models\Product\OtvetstvennostPodryadchik;
use App\Models\Product\TamozhnyaAddLegal;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class AllProductController extends Controller
{
    public function search(Request $request)
    {
        $name = $request->get('name');
        $unique_number = $request->get('unique_number');
        $code = $request->get('code');
        $number = $request->get('number');
        $surname = $request->get('surname');
        $cmp = Cmp::query()
            ->when($name, function ($query) use ($name) {
                $query->whereHas('product', function ($q) use ($name) {
                    $q->where('name', $name);
                });
            })
            ->when($unique_number, function ($query) use ($unique_number) {
                $query->where('unique_number', $unique_number);
            })
            ->when($code, function ($query) use ($code) {
                $query->whereHas('policySeries', function ($q) use ($code) {
                    $q->where('code', $code);
                });
            })
            ->when($number, function ($query) use ($number) {
                $query->whereHas('policy', function ($q) use ($number) {
                    $q->where('number', $number);
                });
            })
            ->when($surname, function ($query) use ($surname) {
                $query->whereHas('agent', function ($q) use ($surname) {
                    $q->where('surname', $surname);
                });
            })
            ->select('id', 'unique_number', 'product_id', 'policy_id', 'policy_series_id', 'user_id');
        $tamojnyaAddLegal = TamozhnyaAddLegal::query()
            ->when($name, function ($query) use ($name) {
                $query->whereHas('product', function ($q) use ($name) {
                    $q->where('name', $name);
                });
            })
            ->when($unique_number, function ($query) use ($unique_number) {
                $query->where('unique_number', $unique_number);
            })
            ->when($code, function ($query) use ($code) {
                $query->whereHas('policySeries', function ($q) use ($code) {
                    $q->where('code', $code);
                });
            })
            ->when($number, function ($query) use ($number) {
                $query->whereHas('policy', function ($q) use ($number) {
                    $q->where('number', $number);
                });
            })
            ->when($surname, function ($query) use ($surname) {
                $query->whereHas('agent', function ($q) use ($surname) {
                    $q->where('surname', $surname);
                });
            })
            ->select('id', 'unique_number', 'product_id', 'policy_id', 'serial_number_policy', 'otvet_litso');
        $otvetstvennostPodryadchik = OtvetstvennostPodryadchik::query()
            ->when($name, function ($query) use ($name) {
                $query->whereHas('product', function ($q) use ($name) {
                    $q->where('name', $name);
                });
            })
            ->when($unique_number, function ($query) use ($unique_number) {
                $query->where('unique_number', $unique_number);
            })
            ->when($code, function ($query) use ($code) {
                $query->whereHas('policySeries', function ($q) use ($code) {
                    $q->where('code', $code);
                });
            })
            ->when($number, function ($query) use ($number) {
                $query->whereHas('policy', function ($q) use ($number) {
                    $q->where('number', $number);
                });
            })
            ->when($surname, function ($query) use ($surname) {
                $query->whereHas('agent', function ($q) use ($surname) {
                    $q->where('surname', $surname);
                });
            })
            ->select('id', 'unique_number', 'product_id', 'policy_id', 'serial_number_policy', 'otvet_litso');

        $allProducts = Bonded::query()
            ->when($name, function ($query) use ($name) {
                $query->whereHas('product', function ($q) use ($name) {
                    $q->where('name', $name);
                });
            })
            ->when($unique_number, function ($query) use ($unique_number) {
                $query->where('unique_number', $unique_number);
            })
            ->when($code, function ($query) use ($code) {
                $query->whereHas('policySeries', function ($q) use ($code) {
                    $q->where('code', $code);
                });
            })
            ->when($number, function ($query) use ($number) {
                $query->whereHas('policy', function ($q) use ($number) {
                    $q->where('number', $number);
                });
            })
            ->when($surname, function ($query) use ($surname) {
                $query->whereHas('agent', function ($q) use ($surname) {
                    $q->where('surname', $surname);
                });
            })
            ->select('id', 'unique_number', 'product_id', 'policy_id', 'policy_series_id', 'user_id')
            ->union($cmp)
            ->union($tamojnyaAddLegal)
            ->union($otvetstvennostPodryadchik)
            ->paginate(4);

        return view('products.index', compact('allProducts'));
    }
}
