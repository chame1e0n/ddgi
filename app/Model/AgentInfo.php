<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgentInfo extends Model
{
    use SoftDeletes;

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'principal.bank_id' => ['required', 'integer'],
        'principal.company' => 'required',
        'principal.bank_account' => 'required',
        'principal.inn' => 'required',
        'principal.mfo' => 'required',
        'principal.agreement_number' => 'required',
        'principal.agreement_date' => 'required',
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
    protected $table = 'agent_infos';

    /**
     * Get relation to the banks table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bank()
    {
        return $this->belongsTo(Bank::class);
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
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->employees as /* @var $employee Employee */ $employee) {
            $employee->agent_info_id = null;
            $employee->save();
        }

        return parent::delete();
    }
}
