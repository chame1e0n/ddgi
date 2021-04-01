<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_terms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("otvetsvennost_audit_id");
            $table->foreign('otvetsvennost_audit_id')
                ->references('id')
                ->on('otvetsvennost_audits');
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
        Schema::dropIfExists('currency_terms');
    }
}
