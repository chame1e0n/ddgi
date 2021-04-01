<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargoPaymentTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo_payment_terms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cargo_infos_id");
            $table->foreign('cargo_infos_id')
                ->references('id')
                ->on('cargo_infos');
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
        Schema::dropIfExists('cargo_payment_terms');
    }
}
