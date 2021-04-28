<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllProductInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_product_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("all_products_id");
            $table->string("policy_series")->nullable(); // Серийный номер полиса
            $table->date("policy_insurance_from")->nullable(); // Дата выдачи страхового полиса
            $table->text("otvet_litso")->nullable(); // Ответственное лицо
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
        Schema::dropIfExists('all_product_information');
    }
}
