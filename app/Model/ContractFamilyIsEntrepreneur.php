<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractFamilyIsEntrepreneur extends Model
{
    use SoftDeletes;

    public const FILE_PASSPORT = 'passport';
    public const FILE_CONTRACT = 'contract';
    public const FILE_CERTIFICATE = 'certificate';
    public const FILE_OTHER_DOCUMENT = 'other_document';

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'contract_family_is_entrepreneur.period_from' => 'required',
        'contract_family_is_entrepreneur.period_to' => 'required',
        'contract_family_is_entrepreneur.sum' => 'required',
        'contract_family_is_entrepreneur.purpose' => 'required',
    ];

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
    protected $table = 'contract_family_is_entrepreneurs';

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contract()
    {
        return $this->morphOne(Contract::class, 'model');
    }

    /**
     * Get relation to the files table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function files()
    {
        return $this->morphMany(File::class, 'model');
    }

    /**
     * Get "family is entrepreneur" contract's files of the specified type.
     * 
     * @param string $type Type
     * @return File
     */
    public function getFile($type = 'document')
    {
        return $this->files()->where('type' , '=', $type)->get()->first();
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->files as /* @var $file File */ $file) {
            $file->delete();
        }

        return parent::delete();
    }
}
