<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractCustomOfficer extends Model
{
    use SoftDeletes;

    public const FILE_DOCUMENT = 'document';

    public const PROFESSIONAL_ACTIVITY_INSURANCE_BANK_AUDIT = 'bank_audit';
    public const PROFESSIONAL_ACTIVITY_INSURANCE_EXCHANGE_AUDIT = 'exchange_audit';
    public const PROFESSIONAL_ACTIVITY_INSURANCE_GENERAL_AUDIT = 'general_audit';
    public const PROFESSIONAL_ACTIVITY_INSURANCE_ORGANIZATION_AUDIT = 'organization_audit';

    public const PROFESSIONAL_SERVICE_INSURANCE_ACCOUNTING_RESTORATION = 'accounting_restoration';
    public const PROFESSIONAL_SERVICE_INSURANCE_ACTIVITY_ANALYSIS = 'activity_analysis';
    public const PROFESSIONAL_SERVICE_INSURANCE_CALCULATION_COMPILATION = 'calculation_compilation';
    public const PROFESSIONAL_SERVICE_INSURANCE_CONSULTING = 'consulting';
    public const PROFESSIONAL_SERVICE_INSURANCE_REPORTING = 'reporting';
    public const PROFESSIONAL_SERVICE_INSURANCE_REPORTING_TRANSLATION = 'reporting_translation';

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
     * Professional service insurance names.
     * 
     * @var array
     */
    public static $professional_service_insurances = [
        self::PROFESSIONAL_SERVICE_INSURANCE_ACCOUNTING_RESTORATION => 'постановка, восстановление и ведение бухгалтерского учета',
        self::PROFESSIONAL_SERVICE_INSURANCE_ACTIVITY_ANALYSIS => 'анализ финансово-хозяйственной деятельности хозяйствующих субъектов',
        self::PROFESSIONAL_SERVICE_INSURANCE_CALCULATION_COMPILATION => 'составление расчетов и деклараций по налогам и другим обязательным платежам',
        self::PROFESSIONAL_SERVICE_INSURANCE_CONSULTING => 'консалтинг по бухгалтерскому учету, налогообложению, планированию, менеджменту и другим вопросам финансово-хозяйственной деятельности',
        self::PROFESSIONAL_SERVICE_INSURANCE_REPORTING => 'составление финансовой отчетности',
        self::PROFESSIONAL_SERVICE_INSURANCE_REPORTING_TRANSLATION => 'перевод национальной финансовой отчетности на международные стандарты бухгалтерского учета',
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
        'contract_custom_officer.geo_zone' => 'required',
        'contract_custom_officer.annual_turnover_first_year' => 'required',
        'contract_custom_officer.annual_turnover_first_money' => 'required',
        'contract_custom_officer.annual_turnover_first_earnings' => 'required',
        'contract_custom_officer.annual_turnover_second_year' => 'required',
        'contract_custom_officer.annual_turnover_second_money' => 'required',
        'contract_custom_officer.annual_turnover_second_earnings' => 'required',
        'contract_custom_officer.activity_period_from' => 'required',
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
    protected $table = 'contract_custom_officers';

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
     * Get custom officer contract's files of the specified type.
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
