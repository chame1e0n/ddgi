<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtvetstvennostRealtorInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otvetstvennost_realtor_infos', function (Blueprint $table) {
            $table->id();
            $table->string('insurer_price');
            $table->string('insurer_sum');
            $table->string('insurer_premium');
            $table->string('time_stay');
            $table->string('position');
            $table->string('experience');
            $table->string('specialty');
            $table->string('insurer_fio');
            $table->date('from_date_polis');
            $table->date('to_date_polis');
            $table->integer('otvetstvennost_realtor_id');
            $table->integer('agent_id');
            $table->integer('policy_series_id');
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
        Schema::dropIfExists('otvetstvennost_realtor_infos');
    }
}
