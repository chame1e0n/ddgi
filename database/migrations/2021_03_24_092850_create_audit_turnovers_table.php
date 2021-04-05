<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditTurnoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_turnovers', function (Blueprint $table) {
            $table->id();
            $table->string('polis_premium')->nullable();
            $table->string('turnover')->nullable();
            $table->string('net_profit')->nullable();
            $table->string('second_polis_premium')->nullable();
            $table->string('second_turnover')->nullable();
            $table->string('second_net_profit')->nullable();
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
        Schema::dropIfExists('audit_turnovers');
    }
}
