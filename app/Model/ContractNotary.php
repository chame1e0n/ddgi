<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContractNotary extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'contract_notaries';
}
