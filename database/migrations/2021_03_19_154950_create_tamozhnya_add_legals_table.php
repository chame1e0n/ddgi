<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamozhnyaAddLegalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamozhnya_add_legals', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->date('from_date');
            $table->date('to_date');
            $table->string('prof_riski');
            $table->boolean('pretenzii_in_ruz')->default(false);
            $table->string('prichina_pretenzii')->nullable();
            $table->string('payment_term');
            $table->string('currencies')->nullable();
            $table->integer('sposob_rascheta')->nullable();
            $table->string('strahovaya_sum');
            $table->text('strahovaya_purpose')->nullable();
            $table->string('franshiza')->nullable();

            $table->string('serial_number_policy')->nullable();
            $table->date('date_issue_policy')->nullable();

            $table->integer('otvet_litso')->index();
            $table->integer('policy_holder_id')->index();

            $table->string('anketa_img')->nullable();
            $table->string('dogovor_img')->nullable();
            $table->string('polis_img')->nullable();

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
        Schema::dropIfExists('tamozhnya_add_legals');
    }
}
