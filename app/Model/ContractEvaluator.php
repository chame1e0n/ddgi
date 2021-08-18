<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractEvaluator extends Model
{
    use SoftDeletes;

    public const FILE_DOCUMENT = 'document';

    public const PROFESSIONAL_ACTIVITY_INSURANCE_BANK_AUDIT = 'bank_audit';
    public const PROFESSIONAL_ACTIVITY_INSURANCE_EXCHANGE_AUDIT = 'exchange_audit';
    public const PROFESSIONAL_ACTIVITY_INSURANCE_GENERAL_AUDIT = 'general_audit';
    public const PROFESSIONAL_ACTIVITY_INSURANCE_ORGANIZATION_AUDIT = 'organization_audit';

    public const REQUIRED_RESPONSIBILITY_LIMIT_ANNUAL = 'annual';
    public const REQUIRED_RESPONSIBILITY_LIMIT_INSURED_EVENT = 'insured_event';

    /**
     * Professional activity insurance names.
     * 
     * @var array
     */
    public static $professional_activity_insurances = [
        self::PROFESSIONAL_ACTIVITY_INSURANCE_BANK_AUDIT => 'аудит банков и кредитных учреждений',
        self::PROFESSIONAL_ACTIVITY_INSURANCE_EXCHANGE_AUDIT => 'аудит бирж, внебюджетных фондов и инвестиционных институтов',
        self::PROFESSIONAL_ACTIVITY_INSURANCE_GENERAL_AUDIT => 'общий аудит',
        self::PROFESSIONAL_ACTIVITY_INSURANCE_ORGANIZATION_AUDIT => 'аудит страховых организаций и обществ взаимного страхования',
    ];

    /**
     * Required responsibility limit names.
     * 
     * @var array
     */
    public static $required_responsibility_limits = [
        self::REQUIRED_RESPONSIBILITY_LIMIT_ANNUAL => 'годовой совокупный',
        self::REQUIRED_RESPONSIBILITY_LIMIT_INSURED_EVENT => 'по страховому случаю',
    ];


    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'contract_evaluator.geo_zone' => 'required',
        'contract_evaluator.annual_turnover_first_year' => 'required',
        'contract_evaluator.annual_turnover_first_money' => ['required', 'numeric', 'min:0'],
        'contract_evaluator.annual_turnover_first_earnings' => ['required', 'numeric', 'min:0'],
        'contract_evaluator.annual_turnover_second_year' => 'required',
        'contract_evaluator.annual_turnover_second_money' => ['required', 'numeric', 'min:0'],
        'contract_evaluator.annual_turnover_second_earnings' => ['required', 'numeric', 'min:0'],
        'contract_evaluator.activity_period_from' => 'required',
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
    protected $table = 'contract_evaluators';

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
     * Get evaluator contract's files of the specified type.
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

        return parent::delete();
    }
}
