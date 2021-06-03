<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'branches';

    /**
     * Get relation to the employees table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function director()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Get relation to the branches table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Get relation to the regions table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * Get relation to the employees table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * Get relation to the policies table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function policies()
    {
        return $this->hasMany(Policy::class);
    }

    /**
     * Get relation to the policy_flows table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function policy_flows()
    {
        return $this->hasMany(PolicyFlow::class);
    }

    /**
     * Get relation to the pretensions table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pretensions()
    {
        return $this->hasMany(Pretension::class);
    }
}
