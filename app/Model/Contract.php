<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use SoftDeletes;

    public const PAYMENT_TYPE_ENTIRELY = 'entirely';
    public const PAYMENT_TYPE_TRANCHE = 'tranche';

    public const TYPE_INDIVIDUAL = 'individual';
    public const TYPE_LEGAL = 'legal';

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'contracts';

    /**
     * Get relation to the beneficiaries table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }

    /**
     * Get relation to the borrowers table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function borrower()
    {
        return $this->belongsTo(Borrower::class);
    }

    /**
     * Get relation to the clients table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get relation to the currencies table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Get relation to the payment_methods table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /**
     * Get relation to the pledgers table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pledger()
    {
        return $this->belongsTo(Pledger::class);
    }

    /**
     * Get relation to the specifications table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specification()
    {
        return $this->belongsTo(Specification::class);
    }

    /**
     * Get relation to the policies table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function policies()
    {
        return $this->hasMany(Policy::class);
    }

    /**
     * Get relation to the contract_*s table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function contract_model()
    {
        return $this->morphTo('model');
    }
}
