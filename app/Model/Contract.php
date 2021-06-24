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

    public const FILE_TYPE_QUESTIONARY = 'questionary';
    public const FILE_TYPE_AGREEMENT = 'agreement';
    public const FILE_TYPE_POLICY = 'policy';

    /**
     * Name of the table for the model.
     *
     * @var string
     */
    protected $table = 'contracts';

    /**
     * Payment type names.
     * 
     * @var array
     */
    public static $payment_types = [
        self::PAYMENT_TYPE_ENTIRELY => 'единовременно',
        self::PAYMENT_TYPE_TRANCHE => 'транш',
    ];

    /**
     * Type names.
     * 
     * @var array
     */
    public static $types = [
        self::TYPE_INDIVIDUAL => 'физическое лицо',
        self::TYPE_LEGAL => 'юридическое лицо',
    ];

    /**
     * Defining default attributes values.
     * @param array $attributes Attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $this->payment_type = Contract::PAYMENT_TYPE_ENTIRELY;

        parent::__construct($attributes);
    }

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
     * Get relation to the insured_persons table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function insured_person()
    {
        return $this->belongsTo(InsuredPerson::class);
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
     * Get relation to the tranches table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tranches()
    {
        return $this->hasMany(Tranche::class);
    }

    /**
     * Get relation to the contract_*s table.
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function contract_model()
    {
        return $this->morphTo('model');
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->policies as /* @var $policy Policy */ $policy) {
            $policy->contract_id = null;
            $policy->save();
        }
        foreach($this->tranches as /* @var $tranche Tranche */ $tranche) {
            $tranche->delete();
        }

        if ($this->contract_model) {
            $this->contract_model->delete();
        }

        return parent::delete();
    }
}
