<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specification extends Model
{
    use SoftDeletes;

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
     * The relationship of the specification to interface routers.
     * 
     * @var array
     */
    public $specification_to_routes = [
        'S_BAI' => 'borrower',
        'S_IOAAA' => 'borrower_sportsman',
        'S_CAI24HAD' => 'neshchastka/time',
        'S_AI' => null,
        'S_IOPIIRTAA' => 'mejd',
        'S_VHI' => null,
        'S_IAID' => null,
        'S_CVMI' => null,
        'S_I' => 'covid-fiz',
        'S_PVI' => 'zalog/autozalog-mnogostoronniy',
        'S_LVI' => 'tc-lizing-zalog',
        'S_VVI' => 'kasco',
        'S_VCVICIAL' => null,
        'S_VCVICIAW' => null,
        'S_IOTVBP' => 'zalog/autozalog3x',
        'S_IOAMLO' => null,
        'S_IOSEPUAAP' => 'zalog/tehnika',
        'S_IOGCEIOAV' => null,
        'S_VIP' => null,
        'S_CIG' => 'export',
        'S_CIS' => 'export',
        'S_PPIM' => 'zalog-imushestvo',
        'S_IOREP' => 'zalog/ipoteka',
        'S_LPI' => 'imushestvo-lizing-zalog',
        'S_PI' => 'dobrovolka_imushestvo',
        'S_IOCAAR' => 'cmp',
        'S_IOCAIRATPL' => null,
        'S_PPIT' => 'zalog/imushestvo3x',
        'S_PIP' => 'zalog-imushestvo',
        'S_VIT' => null,
        'S_VI' => null,
        'S_CLIFTTODG' => null,
        'S_VCLIFTOOHPF' => null,
        'S_CLIFCP' => 'tamozhnya-add-legal',
        'S_CLI' => null,
        'S_PLIOCB' => 'broker',
        'S_IPRA' => 'audit',
        'S_RCLI' => 'otvetstvennost-realtor',
        'S_PLIFA' => 'otvetstvennost/otsenshiki',
        'S_ICRC' => 'otvetstvennost-podryadchik',
        'S_AOAOLI' => null,
        'S_PLION' => 'otvetstvennost-notaries',
        'S_CLIOCA' => null,
        'S_IOCLOTOOTC' => null,
        'S_LDRIL' => 'credit-nepogashen',
        'S_CLNRRI' => 'credit-nepogashen',
        'S_CCLI' => null,
        'S_MDRI' => null,
        'S_IONOACL' => null,
        'S_CECI' => null,
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
}
