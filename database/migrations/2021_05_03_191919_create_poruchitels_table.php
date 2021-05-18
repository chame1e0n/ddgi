<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoruchitelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poruchitels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("all_products_id");
            $table->string('legal_address')->nullable();
            $table->string('email_guarantor')->nullable();
            $table->string('telephone_guarantor')->nullable();
            $table->string('guarantor_schet')->nullable();
            $table->string('inn_guarantor')->nullable();
            $table->string('mfo_guarantor')->nullable();
            $table->string('bank_guarantor')->nullable();
            $table->string('oked_guarantor')->nullable();
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
        Schema::dropIfExists('poruchitels');
    }
}
