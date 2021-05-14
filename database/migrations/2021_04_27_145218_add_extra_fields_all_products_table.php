<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldsAllProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('all_products', function (Blueprint $table) {
            $table->date('dogovor_date_from')->nullable(); // Период договора с
            $table->date('dogovor_date_to')->nullable(); // Период договора до
            $table->date('dogovor_zalog_date_from')->nullable(); // Период договора залога с
            $table->date('dogovor_zalog_date_to')->nullable(); // Период договора залога до
            $table->date('credit_insurance_from')->nullable(); // Период кредитования с
            $table->date('credit_insurance_to')->nullable(); // Период кредитования до
            $table->text('defect_comment')->nullable(); // При наружном осмотре ТС дефекты и повреждения? комментарий
            $table->text('defect_image')->nullable(); // При наружном осмотре ТС дефекты и повреждения? файл
            $table->text('strtahovka_comment')->nullable(); // Застрахованы ли автотранспортные средства на момент заполнения настоящей анкеты? комментарий
            $table->text('zalog_unique_number')->nullable(); // Номер договора залога
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
