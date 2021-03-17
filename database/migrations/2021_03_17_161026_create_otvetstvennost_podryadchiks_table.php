<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtvetstvennostPodryadchiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otvetstvennost_podryadchiks', function (Blueprint $table) {
            $table->id();
            $table->text('informaciya_o_personale')->nullable();
            $table->date('from_date');
            $table->date('to_date');
            $table->string('geo_zone')->nullable();
            $table->string('payment_term');
            $table->string('currencies')->nullable();
            $table->string('strahovaya_sum');
            $table->text('strahovaya_purpose')->nullable();
            $table->string('serial_number_policy')->nullable();
            $table->date('date_issue_policy')->nullable();

            $table->integer('otvet_litso')->index();
            $table->integer('policy_holder_id')->index();
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
        Schema::dropIfExists('otvetstvennost_podryadchiks');
    }
}
