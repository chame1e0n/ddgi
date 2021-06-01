<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContractProperty extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'contract_properties';
}
