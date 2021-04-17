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
            $table->unsignedBigInteger("policy_holder_id");
            $table->string('fio_insured')->nullable();
            $table->string('sum_of_insurance')->nullable();
            $table->string('bonus')->nullable();
            $table->string('tariff')->nullable();
            $table->string('percent_of_tariff')->nullable();
            $table->string('insurance_sum')->nullable();
            $table->string('insurance_bonus')->nullable();
            $table->string('franchise')->nullable();
            $table->string('insurance_premium_currency')->nullable();
            $table->string('payment_term')->nullable();
            $table->string('payment_sum_main')->nullable();
            $table->string('payment_from_main')->nullable();
            $table->string('way_of_calculation')->nullable();
            $table->string("application_form_file")->nullable();
            $table->string("contract_file")->nullable();
            $table->string("policy_file")->nullable();
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
