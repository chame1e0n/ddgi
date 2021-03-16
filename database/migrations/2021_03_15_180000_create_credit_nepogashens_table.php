<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditNepogashensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_nepogashens', function (Blueprint $table) {
            $table->id();
            $table->string('dogovor_credit_num');
            $table->date('credit_from');
            $table->date('credit_to');
            $table->date('credit_validity_period');
            $table->string('credit_sum');
            $table->text('credit_purpose')->nullable();
            $table->text('other_forms')->nullable();
            $table->string('total_sum')->nullable();
            $table->string('total_award')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('serial_number_policy')->nullable();
            $table->date('date_issue_policy')->nullable();

            $table->integer('otvet_litso')->index();
            $table->integer('policy_holder_id')->index();
            $table->integer('zaemshik_id')->index();

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
        Schema::dropIfExists('credit_nepogashens');
    }
}
