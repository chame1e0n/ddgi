<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditInfo extends Model
{
    use SoftDeletes;
    protected $table = 'audit_infos';
    protected $guarded = [];
}
