<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKascoStrahPremiyaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasco_strah_premiya', function (Blueprint $table) {
            $table->id();
            $table->integer('kasco_id');
            $table->string('strah_sum');
            $table->date('strah_date');
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
        Schema::dropIfExists('kasco_strah_premiya');
    }
}
