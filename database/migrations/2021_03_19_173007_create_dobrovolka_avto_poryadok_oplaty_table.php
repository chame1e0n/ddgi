<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDobrovolkaAvtoPoryadokOplatyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dobrovolka_avto_poryadok_oplaty', function (Blueprint $table) {
            $table->id();
            $table->integer('dobrovolka_avto_id');
            $table->string('poryadok_oplaty_summa');
            $table->string('poryadok_oplaty_from');
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
        Schema::dropIfExists('dobrovolka_avto_poryadok_oplaty');
    }
}
