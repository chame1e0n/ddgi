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
            $table->foreign('all_products_id')
                ->references('id')->on('all_products');
            $table->string('policy_series');
            $table->date('policy_insurance_from');
            $table->string('person');
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
