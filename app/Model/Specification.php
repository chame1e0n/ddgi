<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specification extends Model
{
    use SoftDeletes;
    protected $guarded=[];

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'specifications';

    /**
     * Get relation to the types table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
