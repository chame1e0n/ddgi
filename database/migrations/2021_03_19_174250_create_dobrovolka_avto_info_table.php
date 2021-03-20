<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDobrovolkaAvtoInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dobrovolka_avto_info', function (Blueprint $table) {
            $table->id();
            $table->string('seriya_polisa')->nullable();
            $table->string('period_dejstviya_polisa')->nullable();
            $table->string('vybor_agenta')->nullable();
            $table->string('id_stroku')->nullable();
            $table->string('marka')->nullable();
            $table->string('model')->nullable();
            $table->string('modificacia')->nullable();
            $table->string('gos_nomer')->nullable();
            $table->string('nomer_tex_passport')->nullable();
            $table->string('nomer_dvigatelya')->nullable();
            $table->string('gryzopodemnost')->nullable();
            $table->string('colichestvo_posadochnix_mest')->nullable();
            $table->string('strahovaya_stoimost')->nullable();
            $table->string('straxovay_premiya')->nullable();
            $table->string('gibel_avto')->nullable();
            $table->string('neschastnuy_slushau')->nullable();
            $table->string('avto_otvetstvennost')->nullable();
            $table->string('zastrahovanu_avto')->nullable();
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
        Schema::dropIfExists('dobrovolka_avto_info');
    }
}
