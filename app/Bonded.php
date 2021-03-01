<?php

namespace App;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Bonded extends Model
{
    protected $table = 'bonded';
    protected $guarded = [];

    public function product() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
