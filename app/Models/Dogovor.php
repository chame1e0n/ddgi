<?php

namespace App\Models;

use App\Models\Spravochniki\Branch;
use Illuminate\Support\Facades\DB;

class Dogovor
{
    // unique 'dogovor' number (ААВВ/ССDD/E/FFGGGGG)
    public function createUniqueNumber($branchId, $productId, $filledProductTable = 'kasko', $filledProductId = 20)
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
            '1', //currencyCode which should be changed
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

        DB::statement(DB::raw('set @row:=0'));
        $regions = Region::selectRaw('*, @row:=@row+1 as row')->get();

        // get row number
        return $this->integerToString($regions->find($regionId)->row + 1);
    }

    // the second pair of digits (BB)
    public function branchCode($branchRegionId, $branchId, $is_center)
    {
        DB::statement(DB::raw('set @row:=0'));
        //if the branch is not 'insurance Center' (центр страхования)
        $branches = Branch::selectRaw('*, @row:=@row+1 as row')
            ->where('region_id', $branchRegionId)
            ->where('is_center', $is_center)
            ->get();

        // get row number - 1, due to the fact we start our numeration starts from 0
        $code = $branches->find($branchId)->row - 1;

        if($is_center) {
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
    public function yearCode() {
        return date("y");
    }

    // last 5 digits (GGGGG)
    public function filledProductCode($table, $id) {
        DB::statement(DB::raw('set @row:=0'));
        $product = DB::table($table)->selectRaw('*, @row:=@row+1 as row')->get();

        return $this->integerToString($product->where('id', $id)->first()->row, 5);
    }

    // change integer to string with leading zeros
    public function integerToString($value, $padLength = 2)
    {
        return str_pad($value, $padLength, '0', STR_PAD_LEFT);
    }
}