<?php

namespace App\Models;

use App\Models\Spravochniki\Branch;
use Illuminate\Support\Facades\DB;

class Dogovor
{
    // unique 'dogovor' number (ААВВ/ССDD/E/FFGGGGG)
    public function createUniqueNumber($branchId, $currencyCode, $productId, $filledProductTable = 'kasko', $filledProductId = 20)
    {
        //ToDo smth with currency code
        $branch = Branch::find($branchId);
        // get branch region id
        $branchRegionId = $branch->region_id;
        // get product klass id
        $productKlassId = Product::find($productId)->klass_id;

        $regionCode = $this->regionCode($branchRegionId, $branchId);
        $branchCode = $this->branchCode($branchRegionId, $branchId, $branch->is_center);
        $klassCode = $this->klassCode($productKlassId);
        $productCode = $this->productCode($productId);
        $yearCode = $this->yearCode();
        $filledProductCode = $this->filledProductCode($filledProductTable, $filledProductId);

        return sprintf(
            '%s%s/%s%s/%s/%s%s',
            $regionCode,
            $branchCode,
            $klassCode,
            $productCode,
            $currencyCode,
            $yearCode,
            $filledProductCode
        );
    }

    // the first pair of digits (AA)
    public function regionCode($regionId, $branchId)
    {
        // region code for 1st branch (Головной офис) always 01, others increase to 1;
        if ($branchId == 1) {
            return $this->integerToString(1);
        }

        DB::statement(DB::raw('set @crow:=0'));
        $regions = Region::selectRaw('*, @crow:=@crow+1 as crow')->get();

        // get crow number
        return $this->integerToString($regions->find($regionId)->crow + 1);
    }

    // the second pair of digits (BB)
    public function branchCode($branchRegionId, $branchId, $is_center)
    {
        DB::statement(DB::raw('set @crow:=0'));
        //if the branch is not 'insurance Center' (центр страхования)
        $branches = Branch::selectRaw('*, @crow:=@crow+1 as crow')
            ->where('region_id', $branchRegionId)
            ->where('is_center', $is_center)
            ->get();

        // get crow number - 1, due to the fact we start our numeration starts from 0
        $code = $branches->find($branchId)->crow - 1;

        if ($is_center) {
            $code += 70;
        }

        return $this->integerToString($code);
    }

    // the third pair of digits (СС)
    public function klassCode($klassId)
    {
        return Klass::find($klassId)->code;
    }

    // the fourth pair of digits (DD)
    public function productCode($product)
    {
        return Product::find($product)->code;
    }

    // pre last 2 digits(FF)
    public function yearCode()
    {
        return date("y");
    }

    // last 5 digits (GGGGG)
    public function filledProductCode($table, $id)
    {
        DB::statement(DB::raw('set @crow:=0'));
        $product = DB::table($table)->selectRaw('*, @crow:=@crow+1 as crow')->get();

        return $this->integerToString($product->where('id', $id)->first()->crow, 5);
    }

    // change integer to string with leading zeros
    public function integerToString($value, $padLength = 2)
    {
        return str_pad($value, $padLength, '0', STR_PAD_LEFT);
    }
}