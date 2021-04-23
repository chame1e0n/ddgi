<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllProductsTermsTranshesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_products_terms_transhes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("all_products_id")->nullable();
            $table->foreign('all_products_id')
                ->references('id')->on('all_products');
            $table->string('payment_sum')->nullable();
            $table->string('payment_from')->nullable();
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
        Schema::dropIfExists('all_products_terms_transhes');
    }
}
