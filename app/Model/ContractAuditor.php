<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractAuditor extends Model
{
    use SoftDeletes;

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
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'contract_auditors';

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contract()
    {
        return $this->morphOne(Contract::class, 'model');
    }
}