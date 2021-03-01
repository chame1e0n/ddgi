<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBondedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonded', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedInteger('policy_beneficiary_id')->default(0);
            $table->unsignedInteger('policy_holder_id')->default(0);
            $table->foreign('policy_holder_id')->references('id')->on('policy_holders');
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->string('volume')->nullable();
            $table->string('volume_measure')->nullable();
            $table->string('total_price')->nullable();
            $table->date('stock_date')->comment('Период нахождения товара на данном складе')->nullable();
            $table->string('total_insured_price')->comment('Общая страховая сумма')->nullable();
            $table->string('total_insured_closed_stock_price')->comment('Страховая сумма для закрытого склада с общим объемом')->nullable();
            $table->string('total_insured_open_stock_price')->comment('Страховая сумма для открытого склада с общим площадью')->nullable();
            $table->string('insurance_premium')->nullable();
            $table->string('settlement_currency')->comment('Валюта взаиморасчетов')->nullable();
            $table->string('premium_terms')->nullable();
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
        Schema::dropIfExists('bonded');
    }
}
