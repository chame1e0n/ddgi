<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractGeneralPropertyPledge extends Model
{
    use SoftDeletes;

    public const FILE_PASSPORT = 'passport';
    public const FILE_TREATY = 'treaty';
    public const FILE_REFERENCE = 'reference';
    public const FILE_OTHER_DOCUMENT = 'other_document';

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'contract_general_property_pledge.between_agreement_number' => 'required',
        'contract_general_property_pledge.between_agreement_date' => 'required',
        'contract_general_property_pledge.evaluation_basis' => 'required',
        'contract_general_property_pledge.franchise_earthquake_fire_percent' => ['required', 'numeric', 'between:0,99.99'],
        'contract_general_property_pledge.franchise_illegal_action_percent' => ['required', 'numeric', 'between:0,99.99'],
        'contract_general_property_pledge.franchise_other_risks_percent' => ['required', 'numeric', 'between:0,99.99'],
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
    protected $table = 'contract_general_property_pledges';

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
     * Get relation to the properties table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function properties()
    {
        return $this->morphMany(Property::class, 'model');
    }

    /**
     * Get general property pledge contract's files of the specified type.
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
        foreach($this->properties as /* @var $property Property */ $property) {
            $property->delete();
        }

        return parent::delete();
    }
}
