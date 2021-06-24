<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
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
    protected $table = 'types';

    /**
     * Get relation to the specifications table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specifications()
    {
        return $this->hasMany(Specification::class);
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->specifications as /* @var $specification Specification */ $specification) {
            $specification->delete();
        }

        return parent::delete();
    }
}
