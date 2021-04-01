<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyTermsTranshesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_terms_transhes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("borrower_id");
            $table->foreign('borrower_id')
                ->references('id')->on('neshchastka_borrowers');
            $table->string('payment_sum');
            $table->string('payment_from');
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
        Schema::dropIfExists('currency_terms_transhes');
    }
}
