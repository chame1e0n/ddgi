<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Specification extends Model
{
    use SoftDeletes;

    /**
     * The relationship of the specification to interface routers.
     * 
     * @var array
     */
    public static $specification_key_to_routes = [
        'S_BAI' => 'neshchastka_borrower',
        'S_IOAAA' => 'borrower_sportsman',
        'S_CAI24HAD' => 'neshchastka_time',
        'S_AI' => null,
        'S_IOPIIRTAA' => 'mejd',
        'S_VHI' => null,
        'S_IAID' => null,
        'S_CVMI' => null,
        'S_CCI' => 'covid_fiz',
        'S_PVI' => 'zalog_autozalog_mnogostoronniy',
        'S_LVI' => 'lizing_ts',
        'S_VVI' => 'kasco',
        'S_VCVICIAL' => null,
        'S_VCVICIAW' => null,
        'S_IOTVBP' => 'zalog_autozalog3x',
        'S_IOAMLO' => null,
        'S_IOSEPUAAP' => 'zalog_tehnika',
        'S_IOGCEIOAV' => null,
        'S_VIP' => null,
        'S_CIG' => 'plural_export',
        'S_CIS' => 'singular_export',
        'S_PPIM' => 'multilateral_zalog_imushestvo',
        'S_IOREP' => 'zalog_ipoteka',
        'S_LPI' => 'imushestvo_lizing_zalog',
        'S_PI' => 'dobrovolka_imushestvo',
        'S_IOCAAR' => 'cmp',
        'S_IOCAIRATPL' => null,
        'S_PPIT' => 'zalog_imushestvo3x',
        'S_PIP' => 'general_zalog_imushestvo',
        'S_VIT' => null,
        'S_VI' => null,
        'S_CLIFTTODG' => null,
        'S_VCLIFTOOHPF' => null,
        'S_CLIFCP' => 'tamozhnya_add_legal',
        'S_CLI' => 'tamozhnya_add',
        'S_PLIOCB' => 'broker',
        'S_IPRA' => 'audit',
        'S_RCLI' => 'otvetstvennost_realtor',
        'S_PLIFA' => 'otvetstvennost_otsenshiki',
        'S_ICRC' => 'otvetstvennost_podryadchik',
        'S_AOAOLI' => null,
        'S_PLION' => 'otvetstvennost_notaries',
        'S_CLIOCA' => null,
        'S_IOCLOTOOTC' => null,
        'S_LDRIL' => 'credit_nepogashen',
        'S_CLNRRI' => 'potrebkredit',
        'S_CCLI' => 'avtocredit',
        'S_MDRI' => 'microzaym',
        'S_IONOACL' => null,
        'S_CECI' => 'rassrochka',
        'S_IOTRONOTLU' => 'product3777',
        'S_LDRII' => null,
        'S_LDRIO' => null,
        'S_IOTMRAWLTTPOPV' => null,
        'S_IOTRONOTLF' => null,
        'S_LDRIF' => null,
        'S_SI' => 'garant',
        'S_APIS' => null,
        'S_APIC' => null,
    ];

    /**
     * Validation rules for the form fields.
     *
     * @var array
     */
    public static $validate = [
        'specification.type_id' => ['required', 'integer'],
        'specification.code' => 'required',
        'specification.name' => 'required',
        'specification.tariff' => ['nullable', 'numeric', 'between:0,99.99'],
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
    protected $table = 'specifications';

    /**
     * Get relation to the types table.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Get relation to the contracts table.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    /**
     * Get specifications of the specified type.
     * @param string $type Type
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getSpecificationsByType($type)
    {
        if ($type == Contract::TYPE_INDIVIDUAL) {
            return static::where('is_for_individual', 1)->get();
        }
        if ($type == Contract::TYPE_LEGAL) {
            return static::where('is_for_legal', 1)->get();
        }

        return new Collection();
    }

    /**
     * Overriden save method.
     */
    public function save($options = [])
    {
        if (!$this->exists) {
            $this->key = 'S_' . strtoupper(Str::random(8));
        }

        parent::save($options);
    }

    /**
     * Cascade deletion.
     */
    public function delete()
    {
        foreach($this->contracts as /* @var $contract Contract */ $contract) {
            $contract->delete();
        }

        return parent::delete();
    }
}
