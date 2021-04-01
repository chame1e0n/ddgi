<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowerSportsmanInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrower_sportsman_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borrower_sportsman_id');
            $table->foreign('borrower_sportsman_id')->references('id')->on('borrower_sportsmen');
            $table->string('policy_num')->nullable();
            $table->string('policy_series')->nullable();
            $table->string('policy_chronic')->nullable();
            $table->string('policy_agent')->nullable();
            $table->string('polis_fio')->nullable();
            $table->date('polis_date_birth')->nullable();
            $table->string('polis_passport_series')->nullable();
            $table->date('polis_usable_period')->nullable();
            $table->string('polis_benefit')->nullable();
            $table->string('polis_overall_sum')->nullable();
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
        Schema::dropIfExists('borrower_sportsman_infos');
    }
}
