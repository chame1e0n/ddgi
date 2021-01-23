<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pretensii extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'pretensii';

    /**
     * Get the status.
     */
    public function status()
    {
        return $this->hasOne(PretensiiStatus::class, 'id', 'pretensii_status_id');
    }
}
