<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * Name of the columns which should not be fillable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'files';

    /**
     * Get relation to the contract_*s table, containing the file.
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function contract_model()
    {
        return $this->morphTo('model');
    }
}
