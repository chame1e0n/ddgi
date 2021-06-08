<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UsersTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('users')->truncate();
        DB::table('types')->truncate();
        DB::table('specifications')->truncate();
        DB::table('payment_methods')->truncate();
        DB::table('currencies')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        factory(App\User::class, 1)->create();

        $id = DB::table('types')->insertGetId([
            'code' => 'T_IFUC',
            'name' => 'страхование от несчастных случаев',
            'description' => 'Страхование от несчастных случаев.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $id,   'code' => 'S_BAI',         'name' => 'страхование заемщика от несчастных случаев',                                                         'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,   'code' => 'S_IOAAA',       'name' => 'страхование спортсменов от несчастных случаев',                                                      'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,   'code' => 'S_CAI24HAD',    'name' => 'коллективное страхование от несчастных случаев 24 часа в сутки',                                     'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,   'code' => 'S_AI',          'name' => 'страхование от несчастных случаев (единичный полис формата А5)',                                     'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,   'code' => 'S_IOPIIRTAA',   'name' => 'страхование пассажиров при международном сообщении автомобильным транспортом от несчастных случаев', 'is_for_individual' => 1,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
        ]);

        $id = DB::table('types')->insertGetId([
            'code' => 'T_II',
            'name' => 'cтрахование на случай болезни',
            'description' => 'Страхование на случай болезни.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $id,  'code' => 'S_VHI',  'name' => 'добровольное медицинское страхование',                                                               'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_IAID', 'name' => 'страхование от инфекционных заболеваний',                                                            'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_CVMI', 'name' => 'комплексное добровольное медицинское страхование (ДМС + страхование от инфекционных заболеваний)',   'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_I',    'name' => 'страхование',                                                                                        'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
        ]);

        $id = DB::table('types')->insertGetId([
            'code' => 'T_LVI',
            'name' => 'страхование наземных транспортных средств',
            'description' => 'Страхование наземных транспортных средств.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $id,  'code' => 'S_PVI',          'name' => 'страхование транспортного средства выставляемого в залог (многосторонний)',                                                                      'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_LVI',          'name' => 'страхование транспортного средства передаваемого в лизинг',                                                                                      'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_VVI',          'name' => 'добровольное страхование транспортных средств (каско)',                                                                                          'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_VCVICIAL',     'name' => 'добровольное комплексное страхование транспортных средств (каско и ответ. перед. третьими лицами)',                                              'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_VCVICIAW',     'name' => 'добровольное комплексное страхование транспортных средств (каско, несчастный случай с водителем/пассажирами и ответ. перед. третьими лицами)',   'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_IOTVBP',       'name' => 'страхование транспортного средства выставляемого в залог (трех)',                                                                                'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_IOAMLO',       'name' => 'страхования сельхозтехники передаваемого в лизинг (в том числе по работе с АК «Узагролизинг»)',                                                  'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_IOSEPUAAP',    'name' => 'страхование спец. техники выставляемого в залог',                                                                                                'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_IOGCEIOAV',    'name' => 'страхование газо-баллонного оборудования установленное на транспортное средство',                                                                'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_VIP',          'name' => 'полис страхования транспортных средств',                                                                                                         'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
        ]);

        DB::table('types')->insert([
            ['code' => 'T_RRSI',    'name' => 'страхование железнодорожного подвижного состава',    'description' => 'Страхование железнодорожного подвижного состава.',    'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'T_AI',      'name' => 'авиационное страхование',                            'description' => 'Авиационное страхование.',                            'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'T_MI',      'name' => 'морское страхование',                                'description' => 'Морское страхование.',                                'created_at' => date('Y-m-d H:i:s')],
        ]);

        $id = DB::table('types')->insertGetId([
            'code' => 'T_PIIT',
            'name' => 'страхование имущества находящегося в пути',
            'description' => 'Страхование имущества, находящегося в пути.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $id,  'code' => 'S_CIG',  'name' => 'страхование грузов (генеральный договор)',   'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_CIS',  'name' => 'страхование груза (единичный)',              'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
        ]);

        $id = DB::table('types')->insertGetId([
            'code' => 'T_PIAFAND',
            'name' => 'страхование имущества от огня и стихийных бедствий',
            'description' => 'Страхование имущества от огня и стихийных бедствий.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $id,  'code' => 'S_PPIM',         'name' => 'страхование имущества выставляемого в залог (многосторонний)',                       'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_IOREP',        'name' => 'страхование недвижимого имущества передаваемого в залог (ипотеку)',                  'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_LPI',          'name' => 'страхование имущества передаваемого в лизинг',                                       'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_PI',           'name' => 'страхование имущества (добровольное)',                                               'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_IOCAAR',       'name' => 'страхование строительно-монтажных рисков',                                           'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_IOCAIRATPL',   'name' => 'страхование строительно-монтажных рисков и ответственности перед третьими лицами',   'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_PPIT',         'name' => 'страхование имущества выставляемого в залог (трёхсторонний)',                        'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_PIP',          'name' => 'страхование имущества выставляемого в залог (генеральный договор)',                  'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
        ]);

        $id = DB::table('types')->insertGetId([
            'code' => 'T_PDI',
            'name' => 'страхование имущества от ущерба',
            'description' => 'Страхование имущества от ущерба.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $id = DB::table('types')->insertGetId([
            'code' => 'T_MTPLI',
            'name' => 'страхование автогражданской ответственности',
            'description' => 'Страхование автогражданской ответственности.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $id,  'code' => 'S_VIT',  'name' => 'страхование транспортных средств (ответственность перед третьими лицами)',   'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_VI',   'name' => 'страхование транспортных средств',                                           'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
        ]);

        DB::table('types')->insert([
            ['code' => 'T_LIWTFOAI',    'name' => 'страхование ответственности в рамках авиационного страхования',  'description' => 'Страхование ответственности в рамках авиационного страхования.',  'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'T_MLI',         'name' => 'страхование ответственности в рамках морского страхования',      'description' => 'Страхование ответственности в рамках морского страхования.',      'created_at' => date('Y-m-d H:i:s')],
        ]);

        $id = DB::table('types')->insertGetId([
            'code' => 'T_GLI',
            'name' => 'страхование общей гражданской ответственности',
            'description' => 'Страхование общей гражданской ответственности.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $id,  'code' => 'S_CLIFTTODG',    'name' => 'страхование гражданской ответственности при транспортировке опасных грузов',                                 'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_VCLIFTOOHPF',  'name' => 'добровольное страхование гражданской ответственности при эксплуатации опасных производственных объектов',    'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_CLIFCP',       'name' => 'страхование гражданской ответственности по уплате таможенных платежей',                                      'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_CLI',          'name' => 'страхование гражданской ответственности',                                                                    'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_PLIOCB',       'name' => 'страхование профессиональной ответственности таможенных брокеров',                                           'is_for_individual' => 0,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_IPRA',         'name' => 'страхование профессиональной ответственности аудиторов',                                                     'is_for_individual' => 0,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_RCLI',         'name' => 'страхование гражданской ответственности риэлторов (страхование профессиональной ответственности)',           'is_for_individual' => 0,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_PLIFA',        'name' => 'страхование профессиональной ответственности оценщиков',                                                     'is_for_individual' => 0,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_ICRC',         'name' => 'страхование гражданской ответственности подрядчика',                                                         'is_for_individual' => 0,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_AOAOLI',       'name' => 'страхование гражданской ответственности собственников и операторов аэропортов (ARIEL)',                      'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_PLION',        'name' => 'страхование профессиональной ответственности нотариусов',                                                    'is_for_individual' => 0,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_CLIOCA',       'name' => 'страхование гражданской ответственности судебных управляющих',                                               'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_IOCLOTOOTC',   'name' => 'страхование гражданско-правовой ответственности организации налоговых  консультантов',                       'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
        ]);

        $id = DB::table('types')->insertGetId([
            'code' => 'T_LI',
            'name' => 'страхование кредитов',
            'description' => 'Страхование кредитов.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $id,  'code' => 'S_LDRIL',            'name' => 'страхование риска непогашения кредита (юр. лицо)',                                                           'is_for_individual' => 0,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_CLNRRI',           'name' => 'страхования риска непогашения потребительского кредита (генеральное соглашение)',                            'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_CCLI',             'name' => 'комплексное страхование автокредита (непогашение кредита + ТС выставляемого в залог)',                       'is_for_individual' => 1,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_MDRI',             'name' => 'страхование риска непогашения микрозайма (генеральный договор)',                                             'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_IONOACL',          'name' => 'страхование непогашения товарного кредита (генеральный договор)',                                            'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_CECI',             'name' => 'комплексное страхование экспортного контракта',                                                              'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_IOTRONOTLU',       'name' => 'страхование риска непогашения кредита по программе «Каждая семья – предприниматель»',                        'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_LDRII',            'name' => 'страхование риска непогашения кредита (физ. лицо)',                                                          'is_for_individual' => 1,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_LDRIO',            'name' => 'страхование риска непогашения кредита (овердрафт) (генеральный договор)',                                    'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_IOTMRAWLTTPOPV',   'name' => 'страхования рисков завода-изготовителя связанных с кредитованием покупки транспортных средств производства', 'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_IOTRONOTLF',       'name' => 'страхование риска непогашения кредита (по платежной карте «кобренд») (генеральный договор)',                 'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_LDRIF',            'name' => 'страхование риска непогашения кредита (по платежной карте N-Qulay) (генеральный договор)',                   'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
        ]);

        $id = DB::table('types')->insertGetId([
            'code' => 'T_GI',
            'name' => 'страхование поручительства (гарантий)',
            'description' => 'Страхование поручительства (гарантий).',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $id,  'code' => 'S_SI',   'name' => 'страхование поручительства (гарантии)',      'is_for_individual' => 1,   'is_for_legal' => 1,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_APIS', 'name' => 'страхование авансовых платежей (услуга)',    'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $id,  'code' => 'S_APIC', 'name' => 'страхование авансовых платежей (товар)',     'is_for_individual' => 0,   'is_for_legal' => 0,    'created_at' => date('Y-m-d H:i:s')],
        ]);

        DB::table('types')->insert([
            ['code' => 'T_IAOFR',   'name' => 'страхование от прочих финансовых рисков',            'description' => 'Страхование от прочих финансовых рисков.',            'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'T_IOERTLP', 'name' => 'страхование расходов связанных с правовой защитой',  'description' => 'Страхование расходов, связанных с правовой защитой.', 'created_at' => date('Y-m-d H:i:s')],
        ]);

        DB::table('payment_methods')->insert([
            ['code' => 'PM_LC',             'name' => 'локальная валюта',                                               'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'PM_FC',             'name' => 'локальная валюта в иностранной валюте',                          'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'PM_FCOTDOTCOTC',    'name' => 'иностранная валюта на день заключения договора',                 'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'PM_FCOTDOP',        'name' => 'иностранная валюта на день оплаты',                              'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'PM_FCOTDOPOTPOTFT', 'name' => 'иностранная валюта на день оплаты премии или первого транша',    'created_at' => date('Y-m-d H:i:s')],
        ]);

        DB::table('currencies')->insert([
            ['code' => 'AED', 'priority' => 7, 'name' => 'дирхам ОАЭ',              'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'AFN', 'priority' => 7, 'name' => 'афганский афгани',        'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'AMD', 'priority' => 7, 'name' => 'армянский драм',          'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'ARS', 'priority' => 7, 'name' => 'аргентинский песо',       'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'AUD', 'priority' => 7, 'name' => 'австралийский доллар',    'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'AZN', 'priority' => 7, 'name' => 'азербайджанский манат',   'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'BDT', 'priority' => 7, 'name' => 'бангладешская така',      'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'BGN', 'priority' => 7, 'name' => 'болгарский лев',          'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'BHD', 'priority' => 7, 'name' => 'бахрейнский динар',       'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'BND', 'priority' => 7, 'name' => 'брунейский доллар',       'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'BRL', 'priority' => 7, 'name' => 'бразильский реал',        'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'BYN', 'priority' => 7, 'name' => 'белорусский рубль',       'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'CAD', 'priority' => 7, 'name' => 'канадский доллар',        'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'CHF', 'priority' => 7, 'name' => 'швейцарский франк',       'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'CNY', 'priority' => 7, 'name' => 'китайский юань',          'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'CUP', 'priority' => 7, 'name' => 'кубинский песо',          'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'CZK', 'priority' => 7, 'name' => 'чешская крона',           'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'DKK', 'priority' => 7, 'name' => 'датская крона',           'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'DZD', 'priority' => 7, 'name' => 'алжирский динар',         'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'EGP', 'priority' => 7, 'name' => 'египетский фунт',         'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'EUR', 'priority' => 3, 'name' => 'европейский евро',        'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'GBP', 'priority' => 5, 'name' => 'фунт стерлингов',         'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'GEL', 'priority' => 7, 'name' => 'грузинский лари',         'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'HKD', 'priority' => 7, 'name' => 'гонконгский доллар',      'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'HUF', 'priority' => 7, 'name' => 'венгерский форинт',       'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'IDR', 'priority' => 7, 'name' => 'индонезийская рупия',     'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'ILS', 'priority' => 7, 'name' => 'израильский шекель',      'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'INR', 'priority' => 7, 'name' => 'индийская рупия',         'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'IQD', 'priority' => 7, 'name' => 'иракский доллар',         'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'IRR', 'priority' => 7, 'name' => 'иранский риал',           'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'ISK', 'priority' => 7, 'name' => 'исландская крона',        'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'JOD', 'priority' => 7, 'name' => 'иорданский динар',        'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'JPY', 'priority' => 6, 'name' => 'японская йена',           'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'KGS', 'priority' => 7, 'name' => 'киргизский сом',          'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'KHR', 'priority' => 7, 'name' => 'камбоджийский риель',     'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'KRW', 'priority' => 7, 'name' => 'южно-корейская вона',     'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'KWD', 'priority' => 7, 'name' => 'кувейтский динар',        'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'KZT', 'priority' => 7, 'name' => 'казахский тенге',         'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'LAK', 'priority' => 7, 'name' => 'лаосский кип',            'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'LBP', 'priority' => 7, 'name' => 'ливанский фунт',          'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'LYD', 'priority' => 7, 'name' => 'ливийский динар',         'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'MAD', 'priority' => 7, 'name' => 'марокканский дирхам',     'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'MDL', 'priority' => 7, 'name' => 'молдавский лей',          'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'MNT', 'priority' => 7, 'name' => 'монгольский тугрик',      'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'MXN', 'priority' => 7, 'name' => 'мексиканский песо',       'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'MYR', 'priority' => 7, 'name' => 'малайзийский ринггит',    'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'NOK', 'priority' => 7, 'name' => 'норвежская крона',        'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'NZD', 'priority' => 7, 'name' => 'новозеландский доллар',   'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'OMR', 'priority' => 7, 'name' => 'оманский риал',           'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'PHP', 'priority' => 7, 'name' => 'филиппинский песо',       'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'PKR', 'priority' => 7, 'name' => 'пакистанская рупия',      'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'PLN', 'priority' => 7, 'name' => 'польский злотый',         'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'QAR', 'priority' => 7, 'name' => 'катарский риал',          'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'RON', 'priority' => 7, 'name' => 'румынский лей',           'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'RSD', 'priority' => 7, 'name' => 'сербский динар',          'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'RUB', 'priority' => 4, 'name' => 'российский рубль',        'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'SAR', 'priority' => 7, 'name' => 'саудовский риял',         'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'SDG', 'priority' => 7, 'name' => 'суданский фунт',          'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'SEK', 'priority' => 7, 'name' => 'щведская крона',          'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'SGD', 'priority' => 7, 'name' => 'сингапурский доллар',     'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'SYP', 'priority' => 7, 'name' => 'сирийский фунт',          'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'THB', 'priority' => 7, 'name' => 'таиландский бат',         'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'TJS', 'priority' => 7, 'name' => 'таджикский сомони',       'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'TMT', 'priority' => 7, 'name' => 'туркменский манат',       'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'TND', 'priority' => 7, 'name' => 'тунисский динар',         'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'TRY', 'priority' => 7, 'name' => 'турецкая лира',           'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'UAH', 'priority' => 7, 'name' => 'украинская гривна',       'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'USD', 'priority' => 2, 'name' => 'американский доллар',     'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'UYU', 'priority' => 7, 'name' => 'уругвайский песо',        'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'UZS', 'priority' => 1, 'name' => 'узбекский сум',           'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'VND', 'priority' => 7, 'name' => 'вьетнамский донг',        'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'XDR', 'priority' => 7, 'name' => 'СПЗ',                     'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'YER', 'priority' => 7, 'name' => 'йеменский риал',          'created_at' => date('Y-m-d H:i:s')],
            ['code' => 'ZAR', 'priority' => 7, 'name' => 'южно-африканский рэнд',   'created_at' => date('Y-m-d H:i:s')],
        ]);
    }
}
