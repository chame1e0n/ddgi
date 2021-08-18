<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractPluralExportCargo extends Model
{
    use SoftDeletes;

    public const AGREEMENT_GOODS_TYPE_ORDER = 'order';
    public const AGREEMENT_GOODS_TYPE_STANDARD = 'standard';

    public const FILE_INVOICE = 'invoice';
    public const FILE_BANK_STATEMENT = 'bank_statement';
    public const FILE_PAYMENT_DOCUMENT = 'payment_document';
    public const FILE_PAYMENT_REQUEST_DOCUMENT = 'payment_request_document';
    public const FILE_CORRESPONDENCE = 'correspondence';
    public const FILE_SALES_LEDGER = 'sales_ledger';
    public const FILE_UNPAID_INVOICE = 'unpaid_invoice';
    public const FILE_WARRANTY_DOCUMENT = 'warranty_document';
    public const FILE_ANOTHER_LOSS_DOCUMENT = 'another_loss_document';

    public const WAITING_PERIOD_180 = '180';
    public const WAITING_PERIOD_30 = '30';
    public const WAITING_PERIOD_100 = '300';

    /**
     * Agreement goods type names.
     * 
     * @var array
     */
    public static $agreement_goods_types = [
        self::AGREEMENT_GOODS_TYPE_STANDARD => 'стандартного производства',
        self::AGREEMENT_GOODS_TYPE_ORDER => 'произведены на заказ',
    ];

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'contract_plural_export_cargo.waiting_period' => 'required',
        'contract_plural_export_cargo.agreement_goods_type' => 'required',
        'contract_plural_export_cargo.insurance_country' => 'required',
        'contract_plural_export_cargo.shipping_date' => 'required',
        'contract_plural_export_cargo.shipped_goods_value' => ['required', 'numeric', 'min:0'],
        'contract_plural_export_cargo.shipped_goods_paid' => ['nullable', 'numeric', 'min:0'],
        'contract_plural_export_cargo.buyer_debt' => ['nullable', 'numeric', 'min:0'],
        'contract_plural_export_cargo.overdue_amount_1_60' => ['nullable', 'numeric', 'min:0'],
        'contract_plural_export_cargo.overdue_amount_60_180' => ['nullable', 'numeric', 'min:0'],
        'contract_plural_export_cargo.paid_insurance_premium' => ['nullable', 'numeric', 'min:0'],
        'contract_plural_export_cargo.penalty' => ['nullable', 'numeric', 'min:0'],
        'contract_plural_export_cargo.shipped_goods_payment' => ['nullable', 'numeric', 'min:0'],
        'contract_plural_export_cargo.unshipped_goods_payment' => ['nullable', 'numeric', 'min:0'],
        'contract_plural_export_cargo.other_expenses' => ['nullable', 'numeric', 'min:0'],
        'contract_plural_export_cargo.credit_letter_sum' => ['nullable', 'numeric', 'min:0'],
    ];

    /**
     * Waiting period names.
     * 
     * @var array
     */
    public static $waiting_periods = [
        self::WAITING_PERIOD_30 => '30 дней',
        self::WAITING_PERIOD_100 => '100 дней',
        self::WAITING_PERIOD_180 => '180 дней',
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
    protected $table = 'contract_plural_export_cargos';

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
     * Get plural export cargo contract's files of the specified type.
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
