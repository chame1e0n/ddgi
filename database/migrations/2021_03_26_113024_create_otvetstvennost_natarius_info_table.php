<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtvetstvennostNatariusInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otvetstvennost_natarius_info', function (Blueprint $table) {
            $table->id();
            $table->text('period_polis')->nullable();
            $table->text('polis_id')->nullable();
            $table->date('validity_period_from')->nullable();
            $table->date('validity_period_to')->nullable();
            $table->text('polis_agent')->nullable();
            $table->text('polis_mark')->nullable();
            $table->text('specialty')->nullable();
            $table->text('workExp')->nullable();
            $table->text('polis_model')->nullable();
            $table->text('polis_modification')->nullable();
            $table->text('polis_gos_num')->nullable();
            $table->text('polis_teh_passport')->nullable();
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
        Schema::dropIfExists('otvetstvennost_natarius_info');
    }
}
