<?php

namespace App\Http\Controllers;

use App\AllProductInformation;
use App\Bonded;
use App\Models\Product\AllProduct;
use App\Models\Product\Cmp;
use App\Models\Product\Kasko;
use App\Models\Product\OtvetstvennostPodryadchik;
use App\Models\Product\TamozhnyaAddLegal;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class AjaxFormController extends Controller
{
    public function part()
    {
        $template = request('type');
        $index = request('index');

        return view('products.ajax.' . $template, ['product_index' => $index, 'item' => new AllProductInformation()])->render();
    }
}
