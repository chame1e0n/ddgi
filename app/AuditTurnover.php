<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuditTurnover extends Model
{
    use SoftDeletes;
    protected $table = 'audit_turnovers';
    protected $guarded = [];
}
