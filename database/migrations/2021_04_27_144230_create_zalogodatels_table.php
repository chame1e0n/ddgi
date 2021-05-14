<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZalogodatelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zalogodatels', function (Blueprint $table) {
            $table->id();
            $table->string('fio');
            $table->string('address');
            $table->string('phone');
            $table->string('checking_account');
            $table->string('inn');
            $table->string('mfo');
            $table->integer('bank_id');
            $table->string('oked');
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
        Schema::dropIfExists('zalogodatels');
    }
}
