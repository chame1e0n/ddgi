<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("otvetsvennost_audit_id");
            $table->foreign('otvetsvennost_audit_id')
                ->references('id')
                ->on('otvetsvennost_audits');
            $table->string('number_polis')->nullable();
            $table->string('series_polis')->nullable();
            $table->string('validity_period_from')->nullable();
            $table->string('validity_period_to')->nullable();
            $table->string('polis_agent')->nullable();
            $table->string('polis_mark')->nullable();
            $table->string('specialty')->nullable();
            $table->string('workExp')->nullable();
            $table->string('polis_model')->nullable();
            $table->string('arriving_time')->nullable();
            $table->string('cost_of_insurance')->nullable();
            $table->string('sum_of_insurance')->nullable();
            $table->string('bonus_of_insurance')->nullable();
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
        Schema::dropIfExists('audit_infos');
    }
}
