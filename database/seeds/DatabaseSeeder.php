<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        DB::table('regions')->truncate();
        DB::table('branches')->truncate();
        DB::table('employees')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $admin_users = factory(App\User::class, 1)->create();

        $type_id = DB::table('types')->insertGetId([
            'key' => 'T_IFUC',
            'code' => '01',
            'name' => 'страхование от несчастных случаев',
            'description' => 'Страхование от несчастных случаев.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $type_id, 'key' => 'S_BAI',       'code' => '01', 'name' => 'страхование заемщика от несчастных случаев',                                                         'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_IOAAA',     'code' => '02', 'name' => 'страхование спортсменов от несчастных случаев',                                                      'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_CAI24HAD',  'code' => '03', 'name' => 'коллективное страхование от несчастных случаев 24 часа в сутки',                                     'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_AI',        'code' => '04', 'name' => 'страхование от несчастных случаев (единичный полис формата А5)',                                     'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_IOPIIRTAA', 'code' => '05', 'name' => 'страхование пассажиров при международном сообщении автомобильным транспортом от несчастных случаев', 'is_for_individual' => 1,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
        ]);

        $type_id = DB::table('types')->insertGetId([
            'key' => 'T_II',
            'code' => '02',
            'name' => 'cтрахование на случай болезни',
            'description' => 'Страхование на случай болезни.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $type_id, 'key' => 'S_VHI',   'code' => '01', 'name' => 'добровольное медицинское страхование',                                                               'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_IAID',  'code' => '02', 'name' => 'страхование от инфекционных заболеваний',                                                            'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_CVMI',  'code' => '03', 'name' => 'комплексное добровольное медицинское страхование (ДМС + страхование от инфекционных заболеваний)',   'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_CCI',   'code' => '04', 'name' => 'страхование на случай заболевания коронавирусом COVID-19 (Полис/Договор)',                           'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
        ]);

        $type_id = DB::table('types')->insertGetId([
            'key' => 'T_LVI',
            'code' => '03',
            'name' => 'страхование наземных транспортных средств',
            'description' => 'Страхование наземных транспортных средств.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $type_id, 'key' => 'S_PVI',       'code' => '01', 'name' => 'страхование транспортного средства выставляемого в залог (многосторонний)',                                                                      'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_LVI',       'code' => '02', 'name' => 'страхование транспортного средства передаваемого в лизинг',                                                                                      'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_VVI',       'code' => '03', 'name' => 'добровольное страхование транспортных средств (каско)',                                                                                          'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_VCVICIAL',  'code' => '04', 'name' => 'добровольное комплексное страхование транспортных средств (каско и ответ. перед. третьими лицами)',                                              'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_VCVICIAW',  'code' => '05', 'name' => 'добровольное комплексное страхование транспортных средств (каско, несчастный случай с водителем/пассажирами и ответ. перед. третьими лицами)',   'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_IOTVBP',    'code' => '06', 'name' => 'страхование транспортного средства выставляемого в залог (трех)',                                                                                'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_IOAMLO',    'code' => '07', 'name' => 'страхования сельхозтехники передаваемого в лизинг (в том числе по работе с АК «Узагролизинг»)',                                                  'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_IOSEPUAAP', 'code' => '08', 'name' => 'страхование спец. техники выставляемого в залог',                                                                                                'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_IOGCEIOAV', 'code' => '09', 'name' => 'страхование газо-баллонного оборудования установленное на транспортное средство',                                                                'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_VIP',       'code' => '10', 'name' => 'полис страхования транспортных средств',                                                                                                         'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
        ]);

        DB::table('types')->insert([
            ['key' => 'T_RRSI', 'code' => '04', 'name' => 'страхование железнодорожного подвижного состава',    'description' => 'Страхование железнодорожного подвижного состава.',    'created_at' => date('Y-m-d H:i:s')],
            ['key' => 'T_AI',   'code' => '05', 'name' => 'авиационное страхование',                            'description' => 'Авиационное страхование.',                            'created_at' => date('Y-m-d H:i:s')],
            ['key' => 'T_MI',   'code' => '06', 'name' => 'морское страхование',                                'description' => 'Морское страхование.',                                'created_at' => date('Y-m-d H:i:s')],
        ]);

        $type_id = DB::table('types')->insertGetId([
            'key' => 'T_PIIT',
            'code' => '07',
            'name' => 'страхование имущества находящегося в пути',
            'description' => 'Страхование имущества, находящегося в пути.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $type_id, 'key' => 'S_CIG',   'code' => '01', 'name' => 'страхование грузов (генеральный договор)',   'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_CIS',   'code' => '02', 'name' => 'страхование груза (единичный)',              'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
        ]);

        $type_id = DB::table('types')->insertGetId([
            'key' => 'T_PIAFAND',
            'code' => '08',
            'name' => 'страхование имущества от огня и стихийных бедствий',
            'description' => 'Страхование имущества от огня и стихийных бедствий.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $type_id, 'key' => 'S_PPIM',          'code' => '01', 'name' => 'страхование имущества выставляемого в залог (многосторонний)',                       'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_IOREP',         'code' => '02', 'name' => 'страхование недвижимого имущества передаваемого в залог (ипотеку)',                  'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_LPI',           'code' => '03', 'name' => 'страхование имущества передаваемого в лизинг',                                       'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_PI',            'code' => '04', 'name' => 'страхование имущества (добровольное)',                                               'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_IOCAAR',        'code' => '05', 'name' => 'страхование строительно-монтажных рисков',                                           'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_IOCAIRATPL',    'code' => '06', 'name' => 'страхование строительно-монтажных рисков и ответственности перед третьими лицами',   'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_PPIT',          'code' => '07', 'name' => 'страхование имущества выставляемого в залог (трёхсторонний)',                        'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_PIP',           'code' => '08', 'name' => 'страхование имущества выставляемого в залог (генеральный договор)',                  'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
        ]);

        $type_id = DB::table('types')->insertGetId([
            'key' => 'T_PDI',
            'code' => '09',
            'name' => 'страхование имущества от ущерба',
            'description' => 'Страхование имущества от ущерба.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $type_id = DB::table('types')->insertGetId([
            'key' => 'T_MTPLI',
            'code' => '10',
            'name' => 'страхование автогражданской ответственности',
            'description' => 'Страхование автогражданской ответственности.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $type_id, 'key' => 'S_VIT',   'code' => '01', 'name' => 'страхование транспортных средств (ответственность перед третьими лицами)',    'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_VI',    'code' => '02', 'name' => 'страхование транспортных средств',                                            'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
        ]);

        DB::table('types')->insert([
            ['key' => 'T_LIWTFOAI', 'code' => '11', 'name' => 'страхование ответственности в рамках авиационного страхования',  'description' => 'Страхование ответственности в рамках авиационного страхования.',  'created_at' => date('Y-m-d H:i:s')],
            ['key' => 'T_MLI',      'code' => '12', 'name' => 'страхование ответственности в рамках морского страхования',      'description' => 'Страхование ответственности в рамках морского страхования.',      'created_at' => date('Y-m-d H:i:s')],
        ]);

        $type_id = DB::table('types')->insertGetId([
            'key' => 'T_GLI',
            'code' => '13',
            'name' => 'страхование общей гражданской ответственности',
            'description' => 'Страхование общей гражданской ответственности.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $type_id, 'key' => 'S_CLIFTTODG',     'code' => '01', 'name' => 'страхование гражданской ответственности при транспортировке опасных грузов',                                 'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_VCLIFTOOHPF',   'code' => '02', 'name' => 'добровольное страхование гражданской ответственности при эксплуатации опасных производственных объектов',    'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_CLIFCP',        'code' => '03', 'name' => 'страхование гражданской ответственности по уплате таможенных платежей',                                      'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_CLI',           'code' => '04', 'name' => 'страхование гражданской ответственности',                                                                    'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_PLIOCB',        'code' => '05', 'name' => 'страхование профессиональной ответственности таможенных брокеров',                                           'is_for_individual' => 0,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_IPRA',          'code' => '06', 'name' => 'страхование профессиональной ответственности аудиторов',                                                     'is_for_individual' => 0,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_RCLI',          'code' => '07', 'name' => 'страхование гражданской ответственности риэлторов (страхование профессиональной ответственности)',           'is_for_individual' => 0,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_PLIFA',         'code' => '08', 'name' => 'страхование профессиональной ответственности оценщиков',                                                     'is_for_individual' => 0,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_ICRC',          'code' => '09', 'name' => 'страхование гражданской ответственности подрядчика',                                                         'is_for_individual' => 0,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_AOAOLI',        'code' => '10', 'name' => 'страхование гражданской ответственности собственников и операторов аэропортов (ARIEL)',                      'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_PLION',         'code' => '11', 'name' => 'страхование профессиональной ответственности нотариусов',                                                    'is_for_individual' => 0,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_CLIOCA',        'code' => '12', 'name' => 'страхование гражданской ответственности судебных управляющих',                                               'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_IOCLOTOOTC',    'code' => '13', 'name' => 'страхование гражданско-правовой ответственности организации налоговых  консультантов',                       'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
        ]);

        $type_id = DB::table('types')->insertGetId([
            'key' => 'T_LI',
            'code' => '14',
            'name' => 'страхование кредитов',
            'description' => 'Страхование кредитов.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $type_id, 'key' => 'S_LDRIL',             'code' => '01', 'name' => 'страхование риска непогашения кредита (юр. лицо)',                                                           'is_for_individual' => 0,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_CLNRRI',            'code' => '02', 'name' => 'страхования риска непогашения потребительского кредита (генеральное соглашение)',                            'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_CCLI',              'code' => '03', 'name' => 'комплексное страхование автокредита (непогашение кредита + ТС выставляемого в залог)',                       'is_for_individual' => 1,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_MDRI',              'code' => '04', 'name' => 'страхование риска непогашения микрозайма (генеральный договор)',                                             'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_IONOACL',           'code' => '05', 'name' => 'страхование непогашения товарного кредита (генеральный договор)',                                            'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_CECI',              'code' => '06', 'name' => 'комплексное страхование экспортного контракта',                                                              'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_IOTRONOTLU',        'code' => '07', 'name' => 'страхование риска непогашения кредита по программе «Каждая семья – предприниматель»',                        'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_LDRII',             'code' => '08', 'name' => 'страхование риска непогашения кредита (физ. лицо)',                                                          'is_for_individual' => 1,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_LDRIO',             'code' => '09', 'name' => 'страхование риска непогашения кредита (овердрафт) (генеральный договор)',                                    'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_IOTMRAWLTTPOPV',    'code' => '10', 'name' => 'страхования рисков завода-изготовителя связанных с кредитованием покупки транспортных средств производства', 'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_IOTRONOTLF',        'code' => '11', 'name' => 'страхование риска непогашения кредита (по платежной карте «кобренд») (генеральный договор)',                 'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_LDRIF',             'code' => '12', 'name' => 'страхование риска непогашения кредита (по платежной карте N-Qulay) (генеральный договор)',                   'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10, 'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
        ]);

        $type_id = DB::table('types')->insertGetId([
            'key' => 'T_GI',
            'code' => '15',
            'name' => 'страхование поручительства (гарантий)',
            'description' => 'Страхование поручительства (гарантий).',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('specifications')->insert([
            ['type_id' => $type_id, 'key' => 'S_SI',    'code' => '01', 'name' => 'страхование поручительства (гарантии)',      'is_for_individual' => 1,   'is_for_legal' => 1,    'tariff' => 10,  'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_APIS',  'code' => '02', 'name' => 'страхование авансовых платежей (услуга)',    'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10,  'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
            ['type_id' => $type_id, 'key' => 'S_APIC',  'code' => '03', 'name' => 'страхование авансовых платежей (товар)',     'is_for_individual' => 0,   'is_for_legal' => 0,    'tariff' => 10,  'max_acceptable_amount' => 100000,  'created_at' => date('Y-m-d H:i:s')],
        ]);

        DB::table('types')->insert([
            ['key' => 'T_IAOFR',    'code' => '16', 'name' => 'страхование от прочих финансовых рисков',            'description' => 'Страхование от прочих финансовых рисков.',            'created_at' => date('Y-m-d H:i:s')],
            ['key' => 'T_IOERTLP',  'code' => '17', 'name' => 'страхование расходов связанных с правовой защитой',  'description' => 'Страхование расходов, связанных с правовой защитой.', 'created_at' => date('Y-m-d H:i:s')],
        ]);

        DB::table('payment_methods')->insert([
            ['key' => 'PM_LC',             'name' => 'локальная валюта',                                               'created_at' => date('Y-m-d H:i:s')],
            ['key' => 'PM_FC',             'name' => 'локальная валюта в иностранной валюте',                          'created_at' => date('Y-m-d H:i:s')],
            ['key' => 'PM_FCOTDOTCOTC',    'name' => 'иностранная валюта на день заключения договора',                 'created_at' => date('Y-m-d H:i:s')],
            ['key' => 'PM_FCOTDOP',        'name' => 'иностранная валюта на день оплаты',                              'created_at' => date('Y-m-d H:i:s')],
            ['key' => 'PM_FCOTDOPOTPOTFT', 'name' => 'иностранная валюта на день оплаты премии или первого транша',    'created_at' => date('Y-m-d H:i:s')],
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

        $region_id = DB::table('regions')->insertGetId([
            'name' => 'Республика Каракалпакстан',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Ф-л в Респ.Каракалпакстан',
            'founded_date' => '2012-08-07',
            'address' => 'г. Нукус, 60 лет Каракалпакистана, дом 9.',
            'phone_number' => '(61) 226-35-55;  (97) 788-23-31',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Незметов А.Н.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $admin_employee = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $admin_users->first()->id,
            'role' => 'admin',
            'name' => 'A.',
            'middlename' => 'A.',
            'surname' => 'Administrator',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012345678',
            'phone' => '0123456789',
            'address' => 'address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'А.',
            'middlename' => 'Н.',
            'surname' => 'Незметов',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Отделение "Турткуль"',
            'founded_date' => '2019-09-04',
            'address' => 'г. Нукус, 60 лет Каракалпакистана, дом 9.',
            'phone_number' => '(61) 226-35-55;  (93) 715-30-30',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Джуманиязов Ж.С.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'Ж.',
            'middlename' => 'С.',
            'surname' => 'Джуманиязов',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $region_id = DB::table('regions')->insertGetId([
            'name' => 'Андижанская область',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Андижанский обл.филиал',
            'founded_date' => '2012-05-03',
            'address' => 'г. Андижан, ул.Фуркат, 8 V.',
            'phone_number' => '(99) 402-15-04',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Эргашева Ф.А.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'Ф.',
            'middlename' => 'А.',
            'surname' => 'Эргашева',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Андижанский Центр Страхования',
            'founded_date' => '2019-05-01',
            'address' => 'г. Андижан, ул. Чулпон, 23-уй, 3-кв',
            'phone_number' => '(97) 772-22-45',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Рузиматов Ш.Ш.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'Ш.',
            'middlename' => 'Ш.',
            'surname' => 'Рузиматов',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Андижанский городской филиал',
            'founded_date' => '2019-05-14',
            'address' => 'г. Андижан, ул.Фуркат, 8 V.',
            'phone_number' => '(99) 722-20-90',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Эргашева Ф.А.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'Ф.',
            'middlename' => 'А.',
            'surname' => 'Эргашева',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $region_id = DB::table('regions')->insertGetId([
            'name' => 'Бухарская область',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Бухарский обл.филиал',
            'founded_date' => '2012-05-01',
            'address' => 'г. Бухоро, ул. Узб.Мустакиллиги, 44, 3-кв.',
            'phone_number' => '(0 365) 223-46-77  (93) 453-77-07',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Кудратов Ж.Б.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'Ж.',
            'middlename' => 'Б.',
            'surname' => 'Кудратов',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Бухарский городской филиал',
            'founded_date' => '2020-03-02',
            'address' => 'гг.Бухоро, ул.Б.Накишбандий, дом 31.',
            'phone_number' => '(91) 404-00-44',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Саломов У.Л.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'У.',
            'middlename' => 'Л.',
            'surname' => 'Саломов',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);


        $region_id = DB::table('regions')->insertGetId([
            'name' => 'Джизакская область',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Джизакский обл.филиал',
            'founded_date' => '2013-03-07',
            'address' => 'г. Джизак, Ш.Рашидов, 106',
            'phone_number' => '(72) 226-20-88  (91) 209-00-68',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Холбутаев И.Х.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'И.',
            'middlename' => 'Х.',
            'surname' => 'Холбутаев',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Отделение "Зарбдар"',
            'founded_date' => '2019-03-06',
            'address' => 'г. Джизак, Зарбдарский р-н, ул.Катта Узбек тракти',
            'phone_number' => '(93) 303-78-07',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Султанов А.А.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'А.',
            'middlename' => 'А.',
            'surname' => 'Султанов',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Отделения "Шароф Рашидов"',
            'founded_date' => '2019-07-01',
            'address' => 'г. Джизак, Ш.Рашидовский р-н, Халкабод кфй.',
            'phone_number' => '(98) 561-88-61',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Эркабоев  Н.И.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'Н.',
            'middlename' => 'И.',
            'surname' => 'Эркабоев',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $region_id = DB::table('regions')->insertGetId([
            'name' => 'Кашкадарьинская область',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Кашкадарьинский обл.филиал',
            'founded_date' => '2012-08-21',
            'address' => 'г. Карши, ул.Узбекистон, 219',
            'phone_number' => '(+998 90) 113-77-99  (91) 451-03-08',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Умаров Ч.Ф.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'Ч.',
            'middlename' => 'Ф.',
            'surname' => 'Умаров',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $region_id = DB::table('regions')->insertGetId([
            'name' => 'Навоийская область',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Навоинский обл.филиал',
            'founded_date' => '2012-04-02',
            'address' => 'г. Навои, ул.Навои, 65',
            'phone_number' => '(+998 91) 252-78-40',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Каримов Г.С.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'Г.',
            'middlename' => 'С.',
            'surname' => 'Каримов',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Навоинский Центр Страхования',
            'founded_date' => '2020-03-16',
            'address' => 'г. Навои, ул.Меъморчилар, дом 33.',
            'phone_number' => '(91) 339-00-02  (98) 278-18-80',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Ахматкулов К.Я.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'К.',
            'middlename' => 'Я.',
            'surname' => 'Ахматкулов',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $region_id = DB::table('regions')->insertGetId([
            'name' => 'Наманганская область',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Наманганский обл.филиал',
            'founded_date' => '2012-06-11',
            'address' => 'г. Наманган, ул.Кукумбойшох, 7.',
            'phone_number' => '(0 369) 227-96-00  (90) 260-33-88',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Турахужаев М.С.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'М.',
            'middlename' => 'С.',
            'surname' => 'Турахужаев',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $region_id = DB::table('regions')->insertGetId([
            'name' => 'Самаркандская область',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Самаркандский обл.филиал',
            'founded_date' => '2015-07-01',
            'address' => 'г. Самарканд, ул.Ж.Шоший, 65',
            'phone_number' => '(90) 250-20-34',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Максудов У.Т.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'У.',
            'middlename' => 'Т.',
            'surname' => 'Максудов',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Филиал город Самарканд',
            'founded_date' => '2019-06-01',
            'address' => 'г. Самарканд, пл. Кук-Сарай 1, блок А, 1-этаж',
            'phone_number' => '(90) 198-83-83',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Изаев Ш.Д.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'Ш.',
            'middlename' => 'Д.',
            'surname' => 'Изаев',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Отделение "Марокан"',
            'founded_date' => '2019-09-09',
            'address' => 'г. Самарканд, ул. Ж.Шоший, 65',
            'phone_number' => '(93) 231-56-28',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Шодибаев С.А.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'С.',
            'middlename' => 'А.',
            'surname' => 'Шодибаев',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $region_id = DB::table('regions')->insertGetId([
            'name' => 'Сурхандарьинская область',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Сурхандарьинский обл.филиал',
            'founded_date' => '2011-11-21',
            'address' => 'г.Термез, ул.А.Навоий, 20',
            'phone_number' => '(0 376) 223-06-62  (93) 790-10-44',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Хидаева З.Б.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'З.',
            'middlename' => 'Б.',
            'surname' => 'Хидаева',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $region_id = DB::table('regions')->insertGetId([
            'name' => 'Сырдарьинская область',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Сырдарьинский обл.филиал',
            'founded_date' => '2012-04-16',
            'address' => 'г.Гулистан, ул.Сайхун, 39',
            'phone_number' => '(0 367) 225-25-15  (91) 505-08-09',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Андакулов М.К.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'М.',
            'middlename' => 'К.',
            'surname' => 'Андакулов',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $region_id = DB::table('regions')->insertGetId([
            'name' => 'Ташкентская область',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Ташкентский областной филиал',
            'founded_date' => '2012-08-16',
            'address' => 'г.Ташкент, ул.А.Кодириу, дом 23.',
            'phone_number' => '(90) 983-00-91',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Хамдамов Ф.Х.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'Ф.',
            'middlename' => 'Х.',
            'surname' => 'Хамдамов',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Чирчикский городской филиал',
            'founded_date' => '2019-08-01',
            'address' => '-',
            'phone_number' => '(90) 198-83-83',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Чирчикский г фл руководитель',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'г фл',
            'middlename' => 'руководитель',
            'surname' => 'Чирчикский',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $region_id = DB::table('regions')->insertGetId([
            'name' => 'Ферганская область',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Ферганский обл.филиал',
            'founded_date' => '2011-12-09',
            'address' => 'г.Фергана, ул.А.Фаргоний, 50',
            'phone_number' => '(0 374) 224 72 27  (91) 669-72-27',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Дехконов Т.И.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'Т.',
            'middlename' => 'И.',
            'surname' => 'Дехконов',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Кокандский филиал',
            'founded_date' => '2020-02-03',
            'address' => 'Ферганская обл, г.коканд, 52-мфй,ул.Пустиндуз.',
            'phone_number' => '(90) 309-78-48',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Тургунбоев З.Б.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'З.',
            'middlename' => 'Б.',
            'surname' => 'Тургунбоев',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Отделение "Сух"',
            'founded_date' => '2018-11-01',
            'address' => 'Ферганская обл, район Сух',
            'phone_number' => '-',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Отделение "Сух" руководитель',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => '"Сух"',
            'middlename' => 'руководитель',
            'surname' => 'Отделение',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $region_id = DB::table('regions')->insertGetId([
            'name' => 'Хорезмская область',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Хорезмский обл.филиал',
            'founded_date' => '2012-07-08',
            'address' => 'г.Ургенч, ул. Тинчлик, 29',
            'phone_number' => '(0 362) 228-59-06  (90) 649-61-06',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Бектурсунов Г.Т.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'Г.',
            'middlename' => 'Т.',
            'surname' => 'Бектурсунов',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Отделение "Хонка"',
            'founded_date' => '2019-02-07',
            'address' => '-',
            'phone_number' => '-',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Отделение "Хонка" руководитель',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => '"Хонка"',
            'middlename' => 'руководитель',
            'surname' => 'Отделение',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Ургенч гор.филиал',
            'founded_date' => '2019-06-12',
            'address' => 'г.Ургенч, ул.Ёгду,1',
            'phone_number' => '(97) 792-30-31',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Хасанов Б.И.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'Б.',
            'middlename' => 'И.',
            'surname' => 'Хасанов',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $region_id = DB::table('regions')->insertGetId([
            'name' => 'г.Ташкент',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Центр страхования',
            'founded_date' => '2018-02-06',
            'address' => 'г.Ташкент, ул.Навои, 27',
            'phone_number' => '(+99890)  322-33-44',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Пулатов А.Б.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'А.',
            'middlename' => 'Б.',
            'surname' => 'Пулатов',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);

        $branch_id = DB::table('branches')->insertGetId([
            'region_id' => $region_id,
            'name' => 'Ташкентский региональный филиал',
            'founded_date' => '2017-02-01',
            'address' => 'г.Ташкент, ул.А.Кодирий,Навои, 23',
            'phone_number' => '(97) 155-55-52',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $user_id = DB::table('users')->insertGetId([
            'name' => 'Сайфуддинов Ш.Ф.',
            'email' => Str::random(8) . '@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $employee_id = DB::table('employees')->insertGetId([
            'branch_id' => $branch_id,
            'user_id' => $user_id,
            'role' => 'director',
            'name' => 'Ш.',
            'middlename' => 'Ф.',
            'surname' => 'Сайфуддинов',
            'birthdate' => '1970-01-01',
            'passport_series' => 'AA',
            'passport_number' => '012846682',
            'phone' => '998931234567',
            'address' => 'Test address',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('branches')->where('id', $branch_id)->update(['director_id' => $employee_id]);
    }
}
