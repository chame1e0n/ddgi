<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllProductInformationTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_product_information_transports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("all_products_id");
            $table->text("polis_mark")->nullable();
            $table->text("polis_model")->nullable();
            $table->text("polis_gos_num")->nullable();
            $table->text("polis_teh_passport")->nullable();
            $table->text("polis_num_engine")->nullable();
            $table->text("agents")->nullable();
            $table->text("polis_payload")->nullable();
            $table->text("modification")->nullable();
            $table->text("state_num")->nullable();
            $table->text("num_tech_passport")->nullable();
            $table->text("num_engine")->nullable();
            $table->text("num_carcase")->nullable();
            $table->text("carrying_capacity")->nullable();
            $table->text("insurance_cost")->nullable();
            $table->text("overall_polis_sum")->nullable();
            $table->text("polis_premium")->nullable();
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
        Schema::dropIfExists('all_product_information_transports');
    }
}
