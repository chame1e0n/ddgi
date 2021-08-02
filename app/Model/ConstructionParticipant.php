<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConstructionParticipant extends Model
{
    use SoftDeletes;

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'construction_participant.contract_construction_installation_work_id' => ['required', 'integer'],
        'construction_participant.name' => 'required',
    ];

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
    protected $table = 'construction_participants';

    /**
     * Get relation to the contract_construction_installation_works table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contract_construction_installation_work()
    {
        return $this->belongsTo(ContractConstructionInstallationWork::class);
    }
}
