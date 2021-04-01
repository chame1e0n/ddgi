<?php

namespace App;

use App\Models\PolicyHolder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtvetsvennostAudit extends Model
{
    use SoftDeletes;
    protected $table = 'otvetsvennost_audits';
    protected $guarded = [];

    public function policyHolder()
    {
        return $this->hasOne(PolicyHolder::class, 'id', 'policy_holder_id')
            ->with('bank');
    }

    public function auditTurnover()
    {
        return $this->hasOne(AuditTurnover::class, 'id', 'audit_turnover_id');
    }

    public function auditInfos()
    {
        return $this->hasMany(AuditInfo::class, 'otvetsvennost_audit_id', 'id');
    }

    public function currencyTerms()
    {
        return $this->hasMany(CurrencyTerm::class, 'otvetsvennost_audit_id', 'id');
    }
}
