<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_products', function (Blueprint $table) {
            $table->id();
            $table->BigInteger("policy_holder_id")->nullable(); // FK Общие сведения
            $table->BigInteger("policy_beneficiaries_id")->nullable(); // FK выгодоприобритатель
            $table->BigInteger("zaemshik_id")->nullable(); // FK Заемщик
//            $table->foreign('zaemshik_id')
//                ->references('id')->on('zaemshiks');
            $table->tinyInteger('type')->nullable(); // Типы клиента
            $table->text('unique_number')->nullable(); // Номер договора страхования
            $table->text('fio_insured')->nullable();
            $table->text('address_insured')->nullable();
            $table->text('client_type_radio')->nullable();
            $table->text('product_id')->nullable();
            $table->text('steamer_point')->nullable();
            $table->text('appointment_point')->nullable();
            $table->text('geo_zone')->nullable();
            $table->text('overloads_place')->nullable();
            $table->text('country_of_insurance')->nullable();
            $table->text('location_of_cargo')->nullable();
            $table->text('location')->nullable(); // Местонахождение
            $table->text('property_name')->nullable(); // Наименование имущества
            $table->text('fire_alarm_file')->nullable(); // Наличие пожарной сигнализации и средств пожаротушения
            $table->text('security_file')->nullable(); // Наличие охранной сигнализации и средств защиты/охраны
            $table->text('franshize_percent_1')->nullable(); // % от страховой суммы по риску землетрясения и пожара по каждому убытку и/или по всем убыткам в результате каждого страхового случая
            $table->text('franshize_percent_2')->nullable(); // % от страховой суммы по риску противоправные действия третьих лиц по каждому убытку и/или по всем убыткам в результате каждого страхового случая
            $table->text('franshize_percent_3')->nullable(); // % от страховой суммы по другим рискам по каждому убытку и/или по всем убыткам в результате каждого страхового случая
            $table->text('name_of_cargo')->nullable();
            $table->text('type_of_cargo')->nullable();
            $table->text('type_packaging')->nullable();
            $table->text('weight_of_cargo')->nullable();
            $table->text('amount_of_cargo')->nullable();
            $table->text('type_of_transport')->nullable();
            $table->text('qualities_of_cargo')->nullable();
            $table->text('fio_accompanying')->nullable();
            $table->text('position_accompanying')->nullable();
            $table->text('amount_of_cargo_place')->nullable();
            $table->text('transporter')->nullable();
            $table->text('name_of_shipper')->nullable();
            $table->text('address_shipper')->nullable();
            $table->text('name_consignee')->nullable();
            $table->text('address_consignee')->nullable();
            $table->date('insurance_period_from')->nullable();
            $table->date('packaging_period_from')->nullable();
            $table->date('packaging_period_to')->nullable();
            $table->date('term_from')->nullable(); // *Любой* срок с
            $table->date('term_to')->nullable(); // *Любой* срок до
            $table->date('waiting_period_from')->nullable(); // Период ожидания от
            $table->date('waiting_period_to')->nullable(); // Период ожидания до
            $table->text('loan_sum')->nullable(); // Сумма *любого* займа
            $table->text('loan_reason')->nullable(); // Цель получения *любого* займа
            $table->text('condition_insurance')->nullable();
            $table->text('accompanying_file')->nullable();
            $table->text('date_giving_insurance')->nullable();
            $table->text('responsible_person')->nullable();
            $table->text('application_form')->nullable();
            $table->text('contract')->nullable();
            $table->text('policy')->nullable();
            $table->text("tel_insured")->nullable();
            $table->text("passport_series_insured")->nullable();
            $table->text("passport_num_insured")->nullable();
            $table->text("credit_contract")->nullable();
            $table->date("credit_contract_to")->nullable();
            $table->date("insurance_from")->nullable(); // Дата договора страхования
            $table->date("insurance_to")->nullable();
            $table->text('sum_of_insurance')->nullable();
            $table->text('bonus')->nullable();
            $table->text('tariff')->nullable();
            $table->text('percent_of_tariff')->nullable();
            $table->text('ocenka_osnovaniya')->nullable(); // Основание для оценки
            $table->text('nomer_dogovor_strah_vigod')->nullable(); // Номер договора между страхователем и выгодоприобритателем
            $table->date('date_dogovor_strah_vigod')->nullable(); // Дата договора между страхователем и выгодоприобритателем
            $table->text('insurance_sum')->nullable(); // Cтраховая сумма
            $table->text('insurance_bonus')->nullable(); // Cтраховая премия
            $table->text('franchise')->nullable(); // Франшиза
            $table->text('insurance_premium_currency')->nullable(); // Валюта взаиморасчетов
            $table->text('payment_term')->nullable(); // Порядок оплаты страховой премии
            $table->integer('sposob_rascheta')->nullable(); // Способ расчета
            $table->float('tarif_other')->nullable(); // Укажите процент тарифа
            $table->float('premiya_other')->nullable(); // Укажите процент премии
            $table->text('payment_sum_main')->nullable();
            $table->text('payment_from_main')->nullable();
            $table->text('way_of_calculation')->nullable();
            $table->text("application_form_file")->nullable(); // Анкета
            $table->text("contract_file")->nullable(); // Договор
            $table->text("policy_file")->nullable(); // Полис
            $table->BigInteger('user_id')->nullable();
//            $table->foreign('user_id')
//                ->references('id')->on('users');
            $table->text('comments')->nullable();
            $table->text('dogovor_lizing_num')->nullable();
            $table->text('insurance_aim')->nullable();
            $table->text('currency')->nullable();
            $table->text('credit_dogovor_number')->nullable(); // Номер кредитного договора
            $table->date('credit_dogovor_from_date')->nullable(); // Дата кредитного договора
            $table->date('object_from_date')->nullable(); // Срок действия договора страхования
            $table->date('object_to_date')->nullable(); // Срок действия договора страхования
            $table->text('vid_zalog_obespech')->nullable(); // Вид залогового обеспечения
            $table->text('product_desc')->nullable(); // Описание товара
            $table->text('sum_zalog_obespech')->nullable(); // Сумма залогового обеспечения
            $table->text('using_tc')->nullable();  //Использования ТС на основании
            $table->text('other_info')->nullable();
            $table->text('insurance_total_sum')->nullable();
            $table->text('insurance_gift')->nullable();
            $table->text("payment_currency")->nullable();
            $table->text("polis_series")->nullable();
            $table->date("polis_from")->nullable();
            $table->text("litso")->nullable();
            $table->text("passport_copy")->nullable(); // Загрузка паспорта
            $table->text("dogovor_copy")->nullable(); // Загрузка договора
            $table->text("spravka_copy")->nullable(); // Загрузка справки
            $table->text("spravka_rabota_copy")->nullable(); // Загрузка справки с места работы
            $table->text("other_copy")->nullable(); // Загрузка других документов
            $table->text("other")->nullable();
            $table->text('file')->nullable();
            $table->text('policy_id')->nullable();
            $table->text('policy_series_id')->nullable();
            $table->text('state')->nullable();

            ////broker
            $table->text('year_one')->nullable();
            $table->text('annual_turnover_one')->nullable();
            $table->text('net_profit_one')->nullable();
            $table->text('year_two')->nullable();
            $table->text('annual_turnover_two')->nullable();
            $table->text('net_profit_two')->nullable();
            $table->text('activity_period_from')->nullable();
            $table->text('activity_period_to')->nullable();
            $table->text('acted')->nullable();
            $table->text('public_sector_comment')->nullable();
            $table->text('private_sector_comment')->nullable();
            $table->text('professional_risks')->nullable();
            $table->text('cases')->nullable();
            $table->text('reason_case')->nullable();
            $table->text('administrative_case')->nullable();
            $table->text('reason_administrative_case')->nullable();
            $table->text('sphereOfActivity')->nullable();
            $table->text('profInsuranceServices')->nullable();
            $table->text('liabilityLimit')->nullable();
            $table->text('retransferAktFile')->nullable();

            ///AvtoCredit
            $table->text('credit_from')->nullable();
            $table->text('credit_to')->nullable();
            $table->text('sum_of_credit')->nullable();
            $table->text('insurance_until')->nullable();
            $table->text('credit_franchise')->nullable();
            $table->text('currency_of_settlement')->nullable();

            $table->text('geo_zone')->nullable(); // Географическая зона
            $table->date('period_insurance_from')->nullable(); // Период страхования c
            $table->date('period_insurance_to')->nullable(); // Период страхования до
            $table->bigInteger('ts_osnovanii')->nullable(); // Использования ТС на основании

            $table->timestamps();
            $table->softDeletes();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_products');
    }
}
