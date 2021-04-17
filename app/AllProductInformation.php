<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AllProductInformation extends Model
{
    use SoftDeletes;
    protected $table = 'all_product_information';
    protected $guarded = [];
}
