<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZalogImushestvoInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zalog_imushestvo_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name_property')->comment('Наименование Имущества');
            $table->string('place_property')->comment('Местонахождения имущества');
            $table->string('date_of_issue_property')->comment('Дата выдачи');
            $table->string('count_property')->comment('Кол-во шт.');
            $table->integer('units_property')->comment('Единицы измерения');
            $table->string('insurance_cost')->comment('Страховая стоимость');
            $table->string('insurance_sum')->comment('Страховая сумма');
            $table->string('insurance_premium')->comment('Страховая премия');

            $table->integer('zalog_imushestvo_id');
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
        Schema::dropIfExists('zalog_imushestvo_infos');
    }
}
