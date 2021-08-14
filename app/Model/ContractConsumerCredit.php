<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractConsumerCredit extends Model
{
    use SoftDeletes;

    public const FILE_PASSPORT = 'passport';
    public const FILE_CONSUMER_LOAN_AGREEMENT = 'consumer_loan_agreement';
    public const FILE_RESIDENCE_CERTIFICATE = 'residence_certificate';
    public const FILE_EMPLOYMENT_CERTIFICATE = 'employment_certificate';
    public const FILE_DOCUMENT = 'document';

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'contract_consumer_credit.credit_agreement_number' => 'required',
        'contract_consumer_credit.credit_agreement_date' => 'required',
        'contract_consumer_credit.credit_from' => 'required',
        'contract_consumer_credit.credit_to' => 'required',
        'contract_consumer_credit.credit_sum' => 'required',
        'contract_consumer_credit.collateral_type' => 'required',
        'contract_consumer_credit.description' => 'required',
        'contract_consumer_credit.collateral_sum' => 'required',
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
    protected $table = 'contract_consumer_credits';

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
     * Get consumer credit contract's files of the specified type.
     * 
     * @param string $type Type
     * @return File
     */
    public function getFiles($type = 'document')
    {
        return $this->files()->where('type' , '=', $type)->get();
    }

    /**
     * Get consumer credit contract's file of the specified type.
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
