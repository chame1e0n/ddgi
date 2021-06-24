<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
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
    protected $table = 'regions';

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'region.name' => 'required',
    ];

    /**
     * Get relation to the branches table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->branches as /* @var $branch Branch */ $branch) {
            $branch->delete();
        }

        return parent::delete();
    }
}
