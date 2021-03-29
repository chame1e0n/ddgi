<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaryPaymentTermTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notary_payment_term', function (Blueprint $table) {
            $table->id();
            $table->text('payment_sum')->nullable();
            $table->text('payment_from')->nullable();
            $table->unsignedBigInteger('notary_id');
            $table->foreign('notary_id')->references('id')->on('otvetstvennost_natarius');
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
        Schema::dropIfExists('notary_payment_term');
    }
}
