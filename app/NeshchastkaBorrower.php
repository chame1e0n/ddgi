<?php

namespace App;

use App\Models\PolicyBeneficiaries;
use App\Models\PolicyHolder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NeshchastkaBorrower extends Model
{
    use SoftDeletes;
    protected $table = 'neshchastka_borrowers';
    protected $guarded = [];

    public function policyHolder()
    {
       return $this->hasOne(PolicyHolder::class, 'id', 'policy_holder_id');
//           ->with('bank');
    }

    public function policyBeneficiaries()
    {
        return $this->hasOne(PolicyBeneficiaries::class, 'id', 'policy_beneficiaries_id');
    }

    public function currencyTerms()
    {
        return $this->hasMany(CurrencyTermsTransh::class, 'borrower_id', 'id');
    }
}
