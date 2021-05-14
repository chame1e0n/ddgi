<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZalogImushestvosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zalog_imushestvos', function (Blueprint $table) {
            $table->id();

            $table->string('dogovor_lizing_num');
            $table->date('insurance_from');
            $table->date('insurance_to');

            $table->boolean('plans')->default(false);
            $table->integer('plans_percent')->nullable();

            $table->string('total_insurance_cost')->comment('Общая страховая стоимость');
            $table->integer('zalog_otvet_litso')->comment('Ответственное лицо');
            $table->date('date_of_issue_police')->comment('Дата выдачи страхового полиса (клиенту)');
            $table->integer('policy_series_id')->comment('Серийный номер полиса страхования (Верх)');
            $table->text('place_of_insurance')->comment('Место страхования');
            $table->string('currency_of_mutual')->comment('Валюта взаиморасчетов');

            $table->string('insurance_amount_for_closed')->comment('Страховая сумма для закрытого склада с общим объемом');
            $table->string('insurance_amount_for_open')->comment('Страховая сумма для открытого склада с общим объемом');
            $table->string('strahovaya_purpose_1')->comment('Страховая премия (Верх)');
            $table->string('poryadok_oplaty_premii_1')->comment('Условия оплаты страховой премии (Верх)');

            $table->string('franshiza_1')->comment('% от страховой суммы по риску землетрясения и пожара по каждому убытку и/или по всем убыткам в результате каждого страхового случая');
            $table->string('franshiza_2')->comment('% от страховой суммы по риску противоправные действия третьих лиц по каждому убытку и/или по всем убыткам в результате каждого страхового случая');
            $table->string('franshiza_3')->comment('% от страховой суммы по другим рискам по каждому убытку и/или по всем убыткам в результате каждого страхового случая');

            $table->string('strahovaya_sum');
            $table->string('strahovaya_purpose');
            $table->string('franshiza');

            $table->string('currencies');
            $table->string('poryadok_oplaty_premii');
            $table->integer('sposob_rascheta');

            $table->string('serial_number_policy');
            $table->date('date_issue_policy');
            $table->integer('otvet_litso');

            $table->string('anketa_img')->nullable();
            $table->string('dogovor_img')->nullable();
            $table->string('polis_img')->nullable();

            $table->integer('policy_holder_id');
            $table->integer('policy_beneficiary_id');

            $table->string('copy_passport')->nullable();
            $table->string('copy_dogovor')->nullable();
            $table->string('copy_spravki')->nullable();
            $table->string('copy_drugie')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zalog_imushestvos');
    }
}
