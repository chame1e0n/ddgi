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
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'branch.region_id' => ['required', 'integer'],
        'branch.name' => 'required',
        'branch.founded_date' => 'required',
        'branch.address' => 'required',
        'branch.phone_number' => 'required',
    ];

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
     * Get relation to the branches table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Branch::class, 'parent_id');
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
     * Get relation to the pretensions table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pretensions()
    {
        return $this->hasMany(Pretension::class);
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->children as /* @var $child Branch */ $child) {
            $child->delete();
        }
        foreach($this->employees as /* @var $employee Employee */ $employee) {
            $employee->delete();
        }
        foreach($this->pretensions as /* @var $pretension Pretension */ $pretension) {
            $pretension->delete();
        }

        return parent::delete();
    }
}
