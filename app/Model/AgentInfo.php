<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgentInfo extends Model
{
    use SoftDeletes;

    public const FILE_DOCUMENT = 'document';

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'agent_info.bank_id' => ['required', 'integer'],
        'agent_info.company' => 'required',
        'agent_info.bank_account' => 'required',
        'agent_info.inn' => 'required',
        'agent_info.mfo' => 'required',
        'agent_info.agreement_number' => 'required',
        'agent_info.agreement_date' => 'required',
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
     * Get relation to the files table.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function files()
    {
        return $this->morphMany(File::class, 'model');
    }

    /**
     * Get agent info's files of the specified type.
     * 
     * @param string $type Type
     * @return File
     */
    public function getFiles($type = 'document')
    {
        return $this->files()->where('type' , '=', $type)->get();
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->files as /* @var $file File */ $file) {
            $file->delete();
        }
        foreach($this->employees as /* @var $employee Employee */ $employee) {
            $employee->agent_info_id = null;
            $employee->save();
        }

        return parent::delete();
    }
}
