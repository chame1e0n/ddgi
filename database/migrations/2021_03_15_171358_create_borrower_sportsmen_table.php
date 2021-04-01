<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowerSportsmenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrower_sportsmen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("policy_holder_id");
//            $table->foreign('policy_holder_id')
//                ->references('id')->on('policy_holders');
            $table->date("insurance_from")->nullable();
            $table->date("insurance_to")->nullable();
            $table->string("polis_series")->nullable();
            $table->date("polis_giving_date")->nullable();
            $table->string("litso")->nullable();
            $table->string("insurance_premium_currency")->nullable();
            $table->string("payment_term")->nullable();
            $table->string("all_sum")->nullable();
            $table->string("insurance_bonus")->nullable();
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
        Schema::dropIfExists('borrower_sportsmen');
    }
}
